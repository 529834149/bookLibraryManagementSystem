<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\BooksCategories;
use App\Models\Article;
use Carbon\Carbon;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Article::observe(ArticleObserver::class);

        Carbon::setLocale('zh');
        Schema::defaultStringLength(191);
        $navs = BooksCategories::orderBy('order','ASC')->take(5)->get();
        view()->share('navs',$navs);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }
}
