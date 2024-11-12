<?php

use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('/', fn() => view('home'));
Route::get('/about', fn() => view('about'))->name('about');
Route::get('/service', fn() => view('service.index'))->name('service.index');
Route::get('/service/graphics-design', fn() => view('service.graphics-design'))->name('service.graphics');
Route::get('/service/video-making', [ServiceController::class, "videoMaking"])->name('service.video');
Route::get('/service/seo', fn() => view('service.seo'))->name('service.seo');
Route::get('/service/website-development', [ServiceController::class, "websiteDevelopment"])->name('service.website');
//Route::get('/service/web', [ServiceController::class, "websiteDevelopment"])->name('service.website');
Route::get('/service/facebook-marketing', fn() => view('service.facebook-marketing'))->name('service.facebook');
Route::get('/service/youtube-marketing', fn() => view('service.youtube-marketing'))->name('service.youtube');
Route::get('/blog', fn() => view('blog'))->name('blog');
Route::get('/product', fn() => view('product'))->name('product.index');
Route::get('/product/whatsapp-marketing', fn() => view('whatsapp'))->name('product.whatsapp');
Route::get('/project', fn() => view('project'))->name('project');
Route::get('/contact', fn() => view('contact'))->name('contact');
Route::get('/video-making', fn() => view('video-making'))->name('video-making');

Route::get('/route-cache', function () {
//    Artisan::call('route:cache');
});
