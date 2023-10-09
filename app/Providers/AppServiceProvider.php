<?php

namespace App\Providers;

use App\Modules\DataProviders\Transformation\Converters\Converter;
use App\Modules\DataProviders\Transformation\Converters\XmlConverter;
use App\Modules\DataProviders\Transformation\Sorters\SimpleSorter;
use App\Modules\DataProviders\Transformation\Sorters\Sorter;
use App\Modules\DataProviders\Users\Providers\RandomUserDataProvider;
use App\Modules\DataProviders\Users\Providers\UserDataProvider;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(UserDataProvider::class, RandomUserDataProvider::class);
        $this->app->singleton(Sorter::class, SimpleSorter::class);
        $this->app->singleton(Converter::class, XmlConverter::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
