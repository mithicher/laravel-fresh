<?php

namespace App\Providers;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
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

        Str::macro('arrayToHtmlAttributes', function($array) {
            // return str_replace("=", '=', http_build_query($data, null, ' ', PHP_QUERY_RFC3986)).'';
        
            $tag = '';
            foreach ($array as $key => $value) {
                $tag .= $key . '=' . htmlspecialchars($value) . ' ';
            }
            return $tag;
        });

        Gate::before(function ($user, $ability) {
            return $user->hasRole('Super Admin') ? true : null;
        });

        Blade::directive('date', function ($value) {
            return "<?php echo ($value)->toFormattedDateString(); ?>";
        });
    }
}
