<?php

use Illuminate\Support\Facades\Route;
use App\Filament\Pages\FashionTrendsPage;
use App\Http\Controllers\AccessoratyShopController;
use App\Http\Controllers\AccessoratyBannerAdController;
use App\Http\Controllers\AccessoratySponsorVideoController;
use App\Http\Controllers\PlasticSurgeonController;
use App\Http\Controllers\HairStylistController;
use App\Http\Controllers\BeautyShopController;
use App\Http\Controllers\BeautyTrendsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-livewire', function () {
    return view('test-livewire');
});

// صفحة صيحات الموضة (مدونات الأناقة)
\Filament\Facades\Filament::registerPages([
    FashionTrendsPage::class,
]);

Route::post('/accessoraty/shops', [AccessoratyShopController::class, 'store'])->name('accessoraty.shops.store');
Route::delete('/accessoraty/shops/{id}', [AccessoratyShopController::class, 'destroy'])->name('accessoraty.shops.destroy');

Route::post('/accessoraty/banners', [AccessoratyBannerAdController::class, 'store'])->name('accessoraty.banners.store');
Route::delete('/accessoraty/banners/{id}', [AccessoratyBannerAdController::class, 'destroy'])->name('accessoraty.banners.destroy');

Route::post('/accessoraty/videos', [AccessoratySponsorVideoController::class, 'store'])->name('accessoraty.videos.store');
Route::delete('/accessoraty/videos/{id}', [AccessoratySponsorVideoController::class, 'destroy'])->name('accessoraty.videos.destroy');

Route::post('/hair-stylists', [HairStylistController::class, 'store'])->name('hair-stylists.store');
Route::post('/hair-stylists/video', [HairStylistController::class, 'storeVideo'])->name('hair-stylists.video.store');
Route::delete('/hair-stylists/{id}', [HairStylistController::class, 'destroy'])->name('hair-stylists.destroy');
Route::delete('/hair-stylists/video/{id}', [HairStylistController::class, 'destroyVideo'])->name('hair-stylists.video.destroy');

Route::post('/beauty-shops', [BeautyShopController::class, 'store'])->name('beauty-shops.store');
Route::post('/beauty-shops/banner', [BeautyShopController::class, 'storeBanner'])->name('beauty-shops.banner.store');
Route::post('/beauty-shops/video', [BeautyShopController::class, 'storeVideo'])->name('beauty-shops.video.store');
Route::delete('/beauty-shops/{id}', [BeautyShopController::class, 'destroy'])->name('beauty-shops.destroy');
Route::delete('/beauty-shops/banner/{id}', [BeautyShopController::class, 'destroyBanner'])->name('beauty-shops.banner.destroy');
Route::delete('/beauty-shops/video/{id}', [BeautyShopController::class, 'destroyVideo'])->name('beauty-shops.video.destroy');

// جراحة التجميل
Route::get('/plastic-surgeons', [PlasticSurgeonController::class, 'index'])->name('plastic-surgeons.index');
Route::post('/plastic-surgeons', [PlasticSurgeonController::class, 'store'])->name('plastic-surgeons.store');
Route::delete('/plastic-surgeons/{id}', [PlasticSurgeonController::class, 'destroy'])->name('plastic-surgeons.destroy');
Route::post('/plastic-surgeons/tips', [PlasticSurgeonController::class, 'addTip'])->name('plastic-surgeons.tips');
Route::post('/plastic-surgeons/videos', [PlasticSurgeonController::class, 'addVideo'])->name('plastic-surgeons.videos');

Route::post('/beauty-trends/tip', [BeautyTrendsController::class, 'storeTip'])->name('beauty-trends.tip.store');
Route::post('/beauty-trends/video', [BeautyTrendsController::class, 'storeVideo'])->name('beauty-trends.video.store');
Route::delete('/beauty-trends/tip/{id}', [BeautyTrendsController::class, 'destroyTip'])->name('beauty-trends.tip.destroy');
Route::delete('/beauty-trends/video/{id}', [BeautyTrendsController::class, 'destroyVideo'])->name('beauty-trends.video.destroy');
