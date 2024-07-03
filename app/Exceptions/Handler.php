<?php

namespace App\Exceptions;

use App\Http\Resources\ErrorResource;
use App\Utils\CommonConsts;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;
use App\Exceptions\AppException;


class Handler extends ExceptionHandler
{

    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels
    = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport
    = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation
     * exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash
    = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register(): void
    {
        $this->reportable(
            function (Throwable $e) {
                //
            }
        );

        $this->renderable(
            function (Exception $exception, $request) {
                $msg         = $exception->getMessage();

                $errorCode   = $this->isHttpException($exception)
                    ? $exception->getStatusCode() : Response::HTTP_INTERNAL_SERVER_ERROR;

                if ($exception instanceof ValidationException) {
                    //This exception is thrown when the request fails validation with Laravel's FormValidator
                    $msg         = CommonConsts::MSG_ECMCR004;
                    $errorCode   = Response::HTTP_UNPROCESSABLE_ENTITY;

                    \LogService::outErrorLog(
                        $msg,
                        $exception->errors()
                    );

                    return response()->json(
                        new ErrorResource(
                            [
                                CommonConsts::RES_JSON_KEY_MSG    => $msg,
                                CommonConsts::RES_JSON_KEY_ERRORS => [
                                    $exception->errors()
                                ],
                            ]
                            ),
                        $errorCode
                    );
                } elseif (
                    $exception instanceof AuthenticationException
                ) {
                    // Not logged in, or login has expired
                    $msg = CommonConsts::MSG_ECMCR003;
                    $errorCode   = Response::HTTP_UNAUTHORIZED;

                    \LogService::outErrorLog(
                        $msg,
                        [
                            'URI'    => $request->getRequestUri(),
                            'Method' => $request->getMethod(),
                        ]
                    );

                    return response()->json(
                        new ErrorResource(
                            [
                                CommonConsts::RES_JSON_KEY_MSG        => $msg
                            ]
                            ),
                        $errorCode
                    );
                }elseif($errorCode == Response::HTTP_FORBIDDEN){
                    // No permission
                    $msg = CommonConsts::MSG_ECMCR001;
                    \LogService::outErrorLog(
                        $msg,
                        [
                            'URI'    => $request->getRequestUri(),
                            'Method' => $request->getMethod(),
                        ]
                    );

                    return response()->json(
                        new ErrorResource(
                            [
                                CommonConsts::RES_JSON_KEY_MSG        => $msg
                            ]
                            ),
                        $errorCode
                    );

                }elseif ($errorCode == Response::HTTP_NOT_FOUND || $errorCode == Response::HTTP_METHOD_NOT_ALLOWED) {
                    // Route not found
                    $msg = CommonConsts::MSG_ECMCR002;
                    \LogService::outErrorLog(
                        $msg,
                        [
                            'URI'    => $request->getRequestUri(),
                            'Method' => $request->getMethod(),
                        ]
                    );

                    return response()->json(
                        new ErrorResource(
                            [
                                CommonConsts::RES_JSON_KEY_MSG        => $msg
                            ]
                            ),
                        $errorCode
                    );
                } elseif ($errorCode == CommonConsts::RES_APP_ERROR_CODE_CSRF_ERROR) {
                    // CSRF Token mismatch
                    $msg = CommonConsts::MSG_ECMCR005;
                    \LogService::outErrorLog(
                        $msg,
                        [
                            'URI'    => $request->getRequestUri(),
                            'Method' => $request->getMethod(),
                        ]
                    );

                    return response()->json(
                        new ErrorResource(
                            [
                                CommonConsts::RES_JSON_KEY_MSG        => $msg
                            ]
                            ),
                        $errorCode
                    );
                }elseif($exception instanceof QueryException || $exception instanceof ModelNotFoundException){
                    // The exception is thrown when the record is not found or the SQL statement is incorrect.
                    \LogService::outErrorLog(
                        CommonConsts::MSG_ECMCR007,
                        [
                            CommonConsts::RES_JSON_KEY_MSG        => $msg,
                            CommonConsts::RES_JSON_KEY_ERROR_CODE => $errorCode,
                        ]
                    );

                    $msg = CommonConsts::MSG_ECMCR007;

                    return response()->json(
                        new ErrorResource(
                            [
                                CommonConsts::RES_JSON_KEY_MSG        => $msg,
                            ]
                            ),
                        $errorCode
                    );
                }elseif($exception instanceof AppException){
                    //Application exception
                    \LogService::outErrorLog(
                        $msg,
                        [
                            CommonConsts::RES_JSON_KEY_MSG        => $msg,
                        ]
                    );

                    return response()->json(
                        new ErrorResource(
                            [
                                CommonConsts::RES_JSON_KEY_MSG        => $msg,
                            ]
                        ),
                        $errorCode
                    );
                }

                \LogService::outErrorLog(
                    $msg,
                    [
                        CommonConsts::RES_JSON_KEY_MSG        => $msg,
                        CommonConsts::RES_JSON_KEY_ERROR_CODE => $errorCode,
                    ]
                );

                return response()->json(
                    new ErrorResource(
                        [
                            CommonConsts::RES_JSON_KEY_MSG        => CommonConsts::MSG_ECMCR008
                        ]
                        ),
                    $errorCode
                );
            }
        );

        $this->renderable(
            function (InvalidOrderException $e, $request) {
                return response()->view('errors.invalid-order', [], 500);
            }
        );
    }
}
