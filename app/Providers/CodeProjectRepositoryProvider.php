<?php

namespace CodeProject\Providers;

use CodeProject\Repositories\ProjectNoteRepository;
use CodeProject\Repositories\ProjectNoteRepositoryEloquent;
use CodeProject\Repositories\ProjectRepository;
use CodeProject\Repositories\ProjectRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class CodeProjectRepositoryProvider extends ServiceProvider
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
        $this->app->bind(
            'CodeProject\Repositories\ClientRepository',
            'CodeProject\Repositories\ClientRepositoryEloquent');

        $this->app->bind(
            ProjectRepository::class,
            ProjectRepositoryEloquent::class);

        $this->app->bind(
            ProjectNoteRepository::class,
            ProjectNoteRepositoryEloquent::class);
    }
}
