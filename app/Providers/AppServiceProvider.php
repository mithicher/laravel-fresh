<?php

namespace App\Providers;

use Livewire\Component;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Model::preventLazyLoading(! $this->app->isProduction());
        
        Component::macro('bannerMessage', function($message, $style = 'success') {
            $this->dispatchBrowserEvent('banner-message', [
                'style' => $style, // success|danger
                'message' => $message
            ]);
        });

        Component::macro('notify', function($message, $messageType = 'notice') {
            $this->dispatchBrowserEvent('notify', [
                'type' => $messageType,
                'text' => $message
            ]);
        });

        Gate::before(function ($user, $ability) {
            return $user->hasRole('Super Admin') ? true : null;
        });
    }
}
