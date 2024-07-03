<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utils\CommonConsts;
use App\Repositories\Base\UserRepositoryInterface;
use Illuminate\Http\Response;
use App\Http\Resources\LoginResource;


class UserController extends Controller
{
    private $userRepository;

    public function __construct(
        UserRepositoryInterface $userRepository
    ) {
        $this->userRepository = $userRepository;
    }

    /**
     * ログイン
     *
     * ユーザーのログイン処理を行います。
     *
     * @unauthenticated
     *
     */
    public function login(Request $request)
    {
        $data = $request->validate(
            [
                /**
                 * メールアドレス
                 */
                'email' => 'required|email',
                /**
                 * パスワード
                 */
                'password' => 'required',
            ],
            [],
            [
                "email" => "メールアドレス",
                "password" => "パスワード"
            ]
        );

        $ret = $this->userRepository->login($data);

        if (isset($ret["error"])) {
            /**
             * login failed
             *
             * @status 401
             * @body array{"msg": "ログインできません。メールアドレス・パスワードをご確認ください。"}
             */
            return response()->json(
                [ //ここではエラーのキーをラップしています。
                    CommonConsts::RES_JSON_KEY_MSG => $ret["error"],
                ],
                $ret["status"]
            );
        } else {
            //ここは成功した処理です。
            /**
             * login success
             *
             * @status 200
             * @body array{"msg": "ログインしました。", "token": ""}
             */
            return response()->json(
                [
                    CommonConsts::RES_JSON_KEY_MSG => CommonConsts::MSG_ECMIR002,
                    CommonConsts::RES_JSON_KEY_TOKEN => $ret[CommonConsts::RES_JSON_KEY_TOKEN],
                    "user" => new LoginResource($ret["user"]),
                ],
                Response::HTTP_OK
            );
        }
    }

    /**
     * ログアウト
     *
     * ユーザーのログアウト処理を行います。
     *
     * @authenticated
     *
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        /**
         * logout success
         *
         * @status 200
         * @body array{"msg": "ログアウトしました。"}
         */
        return response()->json([CommonConsts::RES_JSON_KEY_MSG => CommonConsts::MSG_ECMIR001]);
    }
}
