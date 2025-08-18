<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use App\Http\View\Composers\ProfileComposer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;

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
        view()->composer('*', function($view){

            if(!session()->has('Support_User')){
                session()->put('Support_User', "User_".rand('1111','9999'));
            }


            $front_footer_count = DB::table('front_footers')->count();
            $front_footer = DB::table('front_footers')->first();

            $app_settings = DB::table('app_settings')->first();

            $home_meta_tags = DB::table('meta_tags')->where(['url_slug'=>'/'])->first();
            $about_meta_tags = DB::table('meta_tags')->where(['url_slug'=>'about'])->first();
            $contact_meta_tags = DB::table('meta_tags')->where(['url_slug'=>'contact'])->first();


            $view
                ->with('app_settings', $app_settings)
                ->with('front_footer_count', $front_footer_count)
                ->with('front_footer', $front_footer)
                ->with('home_meta_tags', $home_meta_tags)
                ->with('about_meta_tags', $about_meta_tags)
                ->with('contact_meta_tags', $contact_meta_tags);
            
        });
    }
}
