<?php

namespace App\Providers;

use App\Contracts\Repositories\EnduserRepositoryInterface;
use App\Contracts\Repositories\PartnerIPRepositoryInterface;
use App\Contracts\Repositories\DocumentTypeRepositoryInterface;
use App\Contracts\Repositories\PartnerRepositoryInterface;
use App\Contracts\Repositories\RegistrationDocumentTypeRepositoryInterface;
use App\Contracts\Repositories\RegistrationRepositoryInterface;
use App\Contracts\Repositories\UserRepositoryInterface;
use App\Repositories\EnduserRepository;
use App\Repositories\PartnerIPRepository;
use App\Repositories\DocumentTypeRepository;
use App\Repositories\PartnerRepository;
use App\Repositories\RegistrationDocumentTypeRepository;
use App\Repositories\RegistrationRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            UserRepositoryInterface::class,
            UserRepository::class
        );

        $this->app->singleton(
            PartnerRepositoryInterface::class,
            PartnerRepository::class
        );

        $this->app->singleton(
            PartnerIPRepositoryInterface::class,
            PartnerIPRepository::class
        );

        $this->app->singleton(
            EnduserRepositoryInterface::class,
            EnduserRepository::class
        );

        $this->app->singleton(
            RegistrationRepositoryInterface::class,
            RegistrationRepository::class
        );


        $this->app->singleton(
            DocumentTypeRepositoryInterface::class,
            DocumentTypeRepository::class
        );

        $this->app->singleton(
            RegistrationDocumentTypeRepositoryInterface::class,
            RegistrationDocumentTypeRepository::class
        );
    }
}
