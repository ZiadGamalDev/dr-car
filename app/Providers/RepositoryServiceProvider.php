<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(
            'App\Http\Interfaces\AuthInterface',
            'App\Http\Repositories\AuthRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\ConfirmEmailPhoneInterface',
            'App\Http\Repositories\ConfirmEmailPhoneRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\PasswordInterface',
            'App\Http\Repositories\PasswordRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\Admin\CategoryInterface',
            'App\Http\Repositories\Admin\CategoryRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\Admin\ItemInterface',
            'App\Http\Repositories\Admin\ItemRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\Admin\ServiceInterface',
            'App\Http\Repositories\Admin\ServiceRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\ChatInterface',
            'App\Http\Repositories\ChatRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\ReviewInterface',
            'App\Http\Repositories\ReviewRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\FavouriteInterface',
            'App\Http\Repositories\FavouriteRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\BookingServiceInterface',
            'App\Http\Repositories\BookingServiceRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\CouponInterface',
            'App\Http\Repositories\CouponRepository'
        );
        
        

        $this->app->bind(
            'App\Http\Interfaces\AccountInterface',
            'App\Http\Repositories\AccountRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\Admin\StatusOrderInterface',
            'App\Http\Repositories\Admin\StatusOrderRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\SlideInterface',
            'App\Http\Repositories\SlideRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\Admin\PaymentMethodInterface',
            'App\Http\Repositories\Admin\PaymentMethodRepository'
        );

        ######################### Web #########################

        $this->app->bind(
            'App\Http\Interfaces\Web\ItemInterface',
            'App\Http\Repositories\Web\ItemRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\Web\CategoryInterface',
            'App\Http\Repositories\Web\CategoryRepository'
        );


    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
