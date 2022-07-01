<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();

        View::composer([
            "post.create",
            "post.edit",

        ],fn($view)=>$view->with('categories',Category::latest("id")->get()));
        $categories=Category::where("parent_id",null)->get();
        foreach($categories as $category){
            $category->subcat=[Category::where("parent_id",$category->id)->get()];
        }
        View::composer([
            "templates.nav",
        ],fn($view)=>$view->with('categories',$categories));

        $sposts=Post::latest('id')->paginate(10);
        View::composer([
            "stock.list",
        ],fn($view)=>$view->with('sposts',$sposts));

        Blade::if('search',fn()=>request('keyword'));
        Blade::if('trash',fn()=>request('trash'));
    }
}
