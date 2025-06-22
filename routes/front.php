<?php

use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\MainController;
use App\Http\Controllers\Front\ServicesController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::name('front.')
    ->prefix(LaravelLocalization::setLocale())
    ->middleware([ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ])
    ->group(function(){
        Route::get('/', [MainController::class, 'home'])->name('home');
        Route::get('/about', [MainController::class, 'about'])->name('about');
        Route::resource('services', ServicesController::class)->only('index', 'show');
        Route::get('services/{last_service_id}/{limit}', [ServicesController::class, 'getMoreServices'])->name('services.get');
        Route::get('services/{service_id}/portofoliols/{last_service_id}/{limit}', [ServicesController::class, 'getMorePortofolios'])->name('portofolios.get');
        Route::resource('contacts', ContactController::class)->only('index', 'store');
        Route::resource('blogs', BlogController::class)->only('index', 'show');
        Route::get('blogs/{last_blog_id}/{limit}', [BlogController::class, 'getMoreBlogs'])->name('blogs.get');
});

Route::get('/about.php', function () {
    return Redirect::to("/about", 301);
});
Route::get('/blogs.php', function () {
    return Redirect::to("/blogs", 301);
});
Route::get('/contact-us.php', function () {
    return Redirect::to("/contacts", 301);
});
Route::get('/services.php', function () {
    return Redirect::to("/services", 301);
});
Route::get('/blog.php', function () {
    $id = request('id');
    return Redirect::to("/blogs/{$id}", 301);
});
Route::get('/portofolio.php', function () {
    $id = request('id');
    return Redirect::to("/services/{$id}", 301);
});