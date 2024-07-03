<?php

namespace App\Providers;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        JsonResource::withoutWrapping();

        DB::listen(
            function ($query) {
                \LogService::outDebugLog(
                    'DB処理が実行されました。',
                    [
                        'SQL文'  => $query->sql,
                        'パラメータ' => $query->bindings,
                        '実行時間'  => $query->time,
                        '接続名'   => $query->connectionName,
                        '接続DB'  => $query->connection->getDatabaseName(),
                    ],
                    false
                );
            }
        );
    }
}
