<?php

namespace App\Providers;

use App\View\Components\Form\Button;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Define components for view blade
     *
     * @var string[][]
     */
    private $components = [
        [Button::class, 'button'],
    ];

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
        Blade::withoutDoubleEncoding();
        foreach ($this->components as $item) {
            Blade::component(...$item);
        }
    }
}
