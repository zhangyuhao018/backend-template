<?php

namespace App\Services;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LogService
{

    private function preParams($param, $withUser = true)
    {
        $backtrace = debug_backtrace();

        $arrTemp = [
            'クラス名'  => $backtrace[3]['class']."(". $backtrace[2]['line'].")",
            'メソッド名' => $backtrace[3]['function'],
        ];

        if ($withUser) {
            $arrTemp['作業者'] = Auth::id() ?: "不明";
        }

        return $param + $arrTemp;
    }

    public function outInfoLog($msg, $param = [], $withUser = true)
    {
        Log::info($msg, $this->preParams($param, $withUser));
    }

    public function outDebugLog($msg, $param = [], $withUser = true)
    {
        Log::debug($msg, $this->preParams($param, $withUser));
    }

    public function outWarningLog($msg, $param = [], $withUser = true)
    {
        Log::warning($msg, $this->preParams($param, $withUser));
    }

    public function outErrorLog($msg, $param = [], $withUser = true)
    {
        Log::error($msg, $this->preParams($param, $withUser));
    }

    public function outAlertLog($msg, $param = [], $withUser = true)
    {
        Log::alert($msg, $this->preParams($param, $withUser));
    }
}