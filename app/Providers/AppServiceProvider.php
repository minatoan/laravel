<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;
use App\nhanvien;
use App\tochuc;

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
        view()->composer('layout.menu', function($view){
            $user = Auth::check();
            $id = Auth::user()['id'];
            $customer = nhanvien::where('id',$id)->first();
            // dd($customer);
            $view->with(['customer' => $customer]);
        });

        view()->composer('admin.order.order', function($view){
            $user = Auth::check();
            $id = Auth::user()['id'];
            $customer = nhanvien::where('id',$id)->first();
            // dd($customer);
            $view->with(['customer' => $customer]);
        });

        view()->composer('admin.order.orderbill', function($view){
            $user = Auth::check();
            $id = Auth::user()['id'];
            $customer = nhanvien::where('id',$id)->first();
            // dd($customer);
            $view->with(['customer' => $customer]);
        });
        view()->composer('admin.order.print', function($view){
            $user = Auth::check();
            $id = Auth::user()['id'];
            $customer = nhanvien::where('id',$id)->first();
            // dd($customer);
            $view->with(['customer' => $customer]);
        });
    }
}