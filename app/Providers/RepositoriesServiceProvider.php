<?php

namespace App\Providers;

use App\Repositories\Interfaces\Logs\LogRepositoryInterface;
use App\Repositories\Interfaces\Quote\QuoteRepositoryInterface;
use App\Repositories\Interfaces\States\StateRepositoryInterface;
use App\Repositories\Logs\LogRepository;
use App\Repositories\Quotes\QuoteRepository;
use App\Repositories\States\StateRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(LogRepositoryInterface::class, LogRepository::class);
        $this->app->bind(QuoteRepositoryInterface::class, QuoteRepository::class);
        $this->app->bind(StateRepositoryInterface::class, StateRepository::class);
    }

}
