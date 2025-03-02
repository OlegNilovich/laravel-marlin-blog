<?php

namespace App\Providers;

use App\Category;
use App\Comment;
use App\Post;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {      
        #Передаем данные в сайдбар блога
        view()->composer('pages._sidebar', function($view)
        {
            $view->with('featuredPosts', Post::getFeaturedPosts());
            $view->with('popularPosts', Post::getPopularPosts());
            $view->with('recentPosts', Post::getRecentPosts());
            $view->with('categories', Category::all());
        });

        #Передаем данные в сайдбар админки
        view()->composer('admin._sidebar', function($view)
        {
            $view->with('newCommentsCount', Comment::where('status', 0)->count());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

}
