<?php

namespace App\Facades;


use App\Services\LogService;
use Illuminate\Support\Facades\Facade;

class LogServiceFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return LogService::class;
    }

}