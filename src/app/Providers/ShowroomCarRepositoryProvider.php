<?php

namespace App\Providers;

use App\Repositories\IShowroomCarsRepository;
use App\Repositories\ShowroomCarsRepository;
use Illuminate\Support\ServiceProvider;

class ShowroomCarRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IShowroomCarsRepository::class, ShowroomCarsRepository::class);
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
