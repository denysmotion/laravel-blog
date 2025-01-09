<?php

namespace App\Providers;

use App\Models\Post;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View as ViewFacade;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{
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
        Paginator::useBootstrapFive();

        view()->composer('blog.layouts.incs.sidebar', function(View $view) {
            $view->with('popular_posts', Post::query()->orderBy('views', 'desc')->limit(3)->get());
        });

        // ViewFacade::composer('blog.layouts.incs.sidebar', function(View $view) {
        //     $view->with('popular_posts', Post::query()->orderBy('views', 'desc')->limit(3)->get());
        // });
    }
}
