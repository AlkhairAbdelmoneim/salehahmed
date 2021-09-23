<?php

use Illuminate\Support\Facades\Route;
define('PAGINATION_COUNT' , 3);

Route::group(['middleware' =>'auth'] ,function(){

    Route::get('/home', [App\Http\Controllers\Dashboard\WelcomeController::class, 'index'])->name('home');
    Route::post('change', [App\Http\Controllers\Dashboard\WelcomeController::class, 'change'])->name('change_pass');

    route::resource('contact', App\Http\Controllers\Dashboard\ContactController::class)->except(['show']);
    route::resource('service', App\Http\Controllers\Dashboard\ServicesController::class)->except(['show']);
    route::resource('settings', App\Http\Controllers\Dashboard\SiteSettingeController::class)->except(['show']);
    
});

    Route::get('/', [App\Http\Controllers\WelcomeController::class, 'welcome'])->name('welcome');
    Route::post('contact', [App\Http\Controllers\WelcomeController::class, 'contact'])->name('contact');
    Route::get('single/{id}', [App\Http\Controllers\WelcomeController::class, 'single'])->name('single');

    
// Auth::routes();


