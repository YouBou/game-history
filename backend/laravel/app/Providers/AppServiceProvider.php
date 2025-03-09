<?php

namespace App\Providers;

use App\Adapter\Gateway\Query\ExternalInterface\IGameExternal;
use App\Adapter\Gateway\Query\GameQueryGateway;
use App\Infrastructure\ExternalApi\QueryImpl\GameExternalImpl;
use App\Service\Query\GameQuery;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [
        GameQuery::class => GameQueryGateway::class,
        IGameExternal::class => GameExternalImpl::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
