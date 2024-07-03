<?php

namespace App\Repositories\Impl;

use App\Repositories\Base\BaseRepository;
use App\Repositories\Base\UserRepositoryInterface;
use App\Utils\CommonConsts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;


class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * user login
     *
     */
    public function login($data)
    {

        if (Auth::attempt($data)) {
            $user = Auth::user();
            return ["user" => $user, "token" => $user->createToken('token')->plainTextToken];
        } else {
            return ["error" => CommonConsts::MSG_ECMCR006, "status" => Response::HTTP_UNAUTHORIZED];
        }
    }

}


