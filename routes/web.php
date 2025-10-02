
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
use App\Http\Controllers\WeddingPlannerController;
use App\Http\Controllers\MakeupArtistController;
use App\Http\Controllers\WeddingHairStylistController;
use App\Http\Controllers\WeddingVenueController;
use App\Http\Controllers\CateringServiceController;
use App\Http\Controllers\DjPerformerController;
use App\Http\Controllers\FlowerDecoratorController;
use App\Http\Controllers\WeddingDressDesignerController;

// Skin Care Doctors
use App\Http\Controllers\SkinCareDoctorController;

// Nail Lash Specialists
use App\Http\Controllers\NailLashSpecialistController;

// Nutrition Doctors
use App\Http\Controllers\NutritionDoctorController;

// Spa Clinics
use App\Http\Controllers\SpaClinicController;

// Training Videos
use App\Http\Controllers\TrainingVideoController;

// Route test for skin-care-doctors.store
Route::any('/skin-care-doctors-test', function() { return 'test'; })->name('skin-care-doctors.store');

// Route for nail-lash-specialists.store
Route::post('/nail-lash-specialists', [App\Http\Controllers\NailLashSpecialistController::class, 'store'])->name('nail-lash-specialists.store');

// Route for nail-lash-specialists.tips
Route::post('/nail-lash-specialists/tips', [App\Http\Controllers\NailLashSpecialistController::class, 'addTip'])->name('nail-lash-specialists.tips');

// Route for nail-lash-specialists.videos
Route::post('/nail-lash-specialists/videos', [App\Http\Controllers\NailLashSpecialistController::class, 'addVideo'])->name('nail-lash-specialists.videos');

// Route for nutrition-doctors.store
Route::post('/nutrition-doctors', [App\Http\Controllers\NutritionDoctorController::class, 'store'])->name('nutrition-doctors.store');

// Route for nutrition-doctors.tips
Route::post('/nutrition-doctors/tips', [App\Http\Controllers\NutritionDoctorController::class, 'addTip'])->name('nutrition-doctors.tips');

// Route for nutrition-doctors.videos
Route::post('/nutrition-doctors/videos', [App\Http\Controllers\NutritionDoctorController::class, 'addVideo'])->name('nutrition-doctors.videos');

// Route for spa-clinics.store
Route::post('/spa-clinics', [App\Http\Controllers\SpaClinicController::class, 'store'])->name('spa-clinics.store');

// Route for spa-clinics.tips
Route::post('/spa-clinics/tips', [App\Http\Controllers\SpaClinicController::class, 'addTip'])->name('spa-clinics.tips');

// Route for spa-clinics.videos
Route::post('/spa-clinics/videos', [App\Http\Controllers\SpaClinicController::class, 'addVideo'])->name('spa-clinics.videos');

// Route for training-videos.store
Route::post('/training-videos', [App\Http\Controllers\TrainingVideoController::class, 'store'])->name('training-videos.store');

// Route for training-videos.destroy
Route::delete('/training-videos/{id}', [App\Http\Controllers\TrainingVideoController::class, 'destroy'])->name('training-videos.destroy');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/section/{section}', [App\Http\Controllers\HomeController::class, 'section'])->name('section');
Route::get('/search', [App\Http\Controllers\SearchController::class, 'search'])->name('search');

// Section-specific search routes
Route::get('/search/health', [App\Http\Controllers\SectionSearchController::class, 'searchHealth'])->name('search.health');
Route::get('/search/fashion', [App\Http\Controllers\SectionSearchController::class, 'searchFashion'])->name('search.fashion');
Route::get('/search/babies', [App\Http\Controllers\SectionSearchController::class, 'searchBabies'])->name('search.babies');
Route::get('/search/wedding', [App\Http\Controllers\SectionSearchController::class, 'searchWedding'])->name('search.wedding');
Route::get('/search/beauty', [App\Http\Controllers\SectionSearchController::class, 'searchBeauty'])->name('search.beauty');
Route::get('/search/accessoraty', [App\Http\Controllers\SectionSearchController::class, 'searchAccessoraty'])->name('search.accessoraty');

Route::get('/test-livewire', function () {
    return view('test-livewire');
});

// إضافة route لمعالجة إضافة طفل جديد في لوحة الإدارة باسم admin.babies.store
Route::post('/admin/welcome-baby/add', [App\Http\Controllers\AdminWelcomeBabyController::class, 'store'])->name('admin.babies.store');
Route::delete('/admin/babies/{baby}', [\App\Http\Controllers\AdminWelcomeBabyController::class, 'destroy'])->name('admin.babies.destroy');

// Authentication Routes
Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
Route::get('/register', [App\Http\Controllers\AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [App\Http\Controllers\AuthController::class, 'register']);

// New pages routes
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/join-us', function () {
    return view('join-us');
})->name('join-us');
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

// Profile Routes (Protected)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
    Route::put('/profile/update', [App\Http\Controllers\AuthController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/change-password', [App\Http\Controllers\AuthController::class, 'changePassword'])->name('profile.change-password');
});


// صفحة صيحات الموضة (مدونات الأناقة)


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

// منظّمي حفلات الزفاف
Route::get('/wedding-planners', [WeddingPlannerController::class, 'index'])->name('wedding-planners.index');
Route::post('/wedding-planners', [WeddingPlannerController::class, 'store'])->name('wedding-planners.store');
Route::delete('/wedding-planners/{id}', [WeddingPlannerController::class, 'destroy'])->name('wedding-planners.destroy');

// فناني المكياج
Route::get('/makeup-artists', [MakeupArtistController::class, 'index'])->name('makeup-artists.index');
Route::post('/makeup-artists', [MakeupArtistController::class, 'store'])->name('makeup-artists.store');
Route::delete('/makeup-artists/{id}', [MakeupArtistController::class, 'destroy'])->name('makeup-artists.destroy');

// مصففو الشعر للزفاف
Route::get('/wedding-hair-stylists', [WeddingHairStylistController::class, 'index'])->name('wedding-hair-stylists.index');
Route::post('/wedding-hair-stylists', [WeddingHairStylistController::class, 'store'])->name('wedding-hair-stylists.store');
Route::put('/wedding-hair-stylists/{id}', [WeddingHairStylistController::class, 'update'])->name('wedding-hair-stylists.update');
Route::delete('/wedding-hair-stylists/{id}', [WeddingHairStylistController::class, 'destroy'])->name('wedding-hair-stylists.destroy');

// الفنادق والأماكن للزفاف
Route::get('/wedding-venues', [WeddingVenueController::class, 'index'])->name('wedding-venues.index');
Route::post('/wedding-venues', [WeddingVenueController::class, 'store'])->name('wedding-venues.store');
Route::put('/wedding-venues/{id}', [WeddingVenueController::class, 'update'])->name('wedding-venues.update');
Route::delete('/wedding-venues/{id}', [WeddingVenueController::class, 'destroy'])->name('wedding-venues.destroy');

// لافتات الفنادق
Route::post('/wedding-venues/banners', [WeddingVenueController::class, 'storeBanner'])->name('wedding-venues.banners.store');
Route::delete('/wedding-venues/banners/{id}', [WeddingVenueController::class, 'destroyBanner'])->name('wedding-venues.banners.destroy');

// فيديوهات إعلانات الفنادق
Route::post('/wedding-venues/videos', [WeddingVenueController::class, 'storeVideo'])->name('wedding-venues.videos.store');
Route::delete('/wedding-venues/videos/{id}', [WeddingVenueController::class, 'destroyVideo'])->name('wedding-venues.videos.destroy');

// روتات قوائم الطعام والباقات للفنادق
Route::post('wedding-venues/menus', [WeddingVenueController::class, 'storeMenu'])->name('wedding-venues.menus.store');
Route::delete('wedding-venues/menus/{id}', [WeddingVenueController::class, 'destroyMenu'])->name('wedding-venues.menus.destroy');
Route::post('wedding-venues/packages', [WeddingVenueController::class, 'storePackage'])->name('wedding-venues.packages.store');
Route::delete('wedding-venues/packages/{id}', [WeddingVenueController::class, 'destroyPackage'])->name('wedding-venues.packages.destroy');

// خدمات التموين
Route::get('/catering-services', [CateringServiceController::class, 'index'])->name('catering-services.index');
Route::post('/catering-services', [CateringServiceController::class, 'store'])->name('catering-services.store');
Route::put('/catering-services/{id}', [CateringServiceController::class, 'update'])->name('catering-services.update');
Route::delete('/catering-services/{id}', [CateringServiceController::class, 'destroy'])->name('catering-services.destroy');

// قوائم الطعام
Route::post('/catering-services/menus', [CateringServiceController::class, 'storeMenu'])->name('catering-services.menus.store');
Route::delete('/catering-services/menus/{id}', [CateringServiceController::class, 'destroyMenu'])->name('catering-services.menus.destroy');

// باقات الطعام
Route::post('/catering-services/packages', [CateringServiceController::class, 'storePackage'])->name('catering-services.packages.store');
Route::delete('/catering-services/packages/{id}', [CateringServiceController::class, 'destroyPackage'])->name('catering-services.packages.destroy');

// لافتات خدمات الطعام
Route::post('/catering-services/banners', [CateringServiceController::class, 'storeBanner'])->name('catering-services.banners.store');
Route::delete('/catering-services/banners/{id}', [CateringServiceController::class, 'destroyBanner'])->name('catering-services.banners.destroy');

// فيديوهات إعلانات خدمات الطعام
Route::post('/catering-services/videos', [CateringServiceController::class, 'storeVideo'])->name('catering-services.videos.store');
Route::delete('/catering-services/videos/{id}', [CateringServiceController::class, 'destroyVideo'])->name('catering-services.videos.destroy');

// روتات المصورون ومصورو الفيديو
Route::get('/wedding-photographers', [App\Http\Controllers\WeddingPhotographerController::class, 'index'])->name('wedding-photographers.index');
Route::post('/wedding-photographers', [App\Http\Controllers\WeddingPhotographerController::class, 'store'])->name('wedding-photographers.store');
Route::put('/wedding-photographers/{id}', [App\Http\Controllers\WeddingPhotographerController::class, 'update'])->name('wedding-photographers.update');
Route::delete('/wedding-photographers/{id}', [App\Http\Controllers\WeddingPhotographerController::class, 'destroy'])->name('wedding-photographers.destroy');

// روتات باقات المصورين
Route::post('/wedding-photographers/packages', [App\Http\Controllers\WeddingPhotographerController::class, 'storePackage'])->name('wedding-photographers.packages.store');
Route::delete('/wedding-photographers/packages/{id}', [App\Http\Controllers\WeddingPhotographerController::class, 'destroyPackage'])->name('wedding-photographers.packages.destroy');

// روتات لافتات المصورين
Route::post('/wedding-photographers/banners', [App\Http\Controllers\WeddingPhotographerController::class, 'storeBanner'])->name('wedding-photographers.banners.store');
Route::delete('/wedding-photographers/banners/{id}', [App\Http\Controllers\WeddingPhotographerController::class, 'destroyBanner'])->name('wedding-photographers.banners.destroy');

// روتات فيديوهات المصورين
Route::post('/wedding-photographers/videos', [App\Http\Controllers\WeddingPhotographerController::class, 'storeVideo'])->name('wedding-photographers.videos.store');
Route::delete('/wedding-photographers/videos/{id}', [App\Http\Controllers\WeddingPhotographerController::class, 'destroyVideo'])->name('wedding-photographers.videos.destroy');

// مشغلو الدي جي والعازفون
Route::get('/dj-performers', [DjPerformerController::class, 'index'])->name('dj-performers.index');
Route::post('/dj-performers', [DjPerformerController::class, 'store'])->name('dj-performers.store');
Route::put('/dj-performers/{id}', [DjPerformerController::class, 'update'])->name('dj-performers.update');
Route::delete('/dj-performers/{id}', [DjPerformerController::class, 'destroy'])->name('dj-performers.destroy');

// باقات مشغلي الدي جي
Route::post('/dj-performers/packages', [DjPerformerController::class, 'storePackage'])->name('dj-performers.packages.store');
Route::delete('/dj-performers/packages/{id}', [DjPerformerController::class, 'destroyPackage'])->name('dj-performers.packages.destroy');

// لافتات مشغلي الدي جي
Route::post('/dj-performers/banners', [DjPerformerController::class, 'storeBanner'])->name('dj-performers.banners.store');
Route::delete('/dj-performers/banners/{id}', [DjPerformerController::class, 'destroyBanner'])->name('dj-performers.banners.destroy');

// إعلانات فيديو مشغلي الدي جي
Route::post('/dj-performers/video-ads', [DjPerformerController::class, 'storeVideoAd'])->name('dj-performers.video-ads.store');
Route::delete('/dj-performers/video-ads/{id}', [DjPerformerController::class, 'destroyVideoAd'])->name('dj-performers.video-ads.destroy');

// ديكورات الزهور والتجهيزات
Route::get('/flower-decorators', [FlowerDecoratorController::class, 'index'])->name('flower-decorators.index');
Route::post('/flower-decorators', [FlowerDecoratorController::class, 'store'])->name('flower-decorators.store');
Route::put('/flower-decorators/{id}', [FlowerDecoratorController::class, 'update'])->name('flower-decorators.update');
Route::delete('/flower-decorators/{id}', [FlowerDecoratorController::class, 'destroy'])->name('flower-decorators.destroy');

// باقات ديكورات الزهور
Route::post('/flower-decorators/packages', [FlowerDecoratorController::class, 'storePackage'])->name('flower-decorators.packages.store');
Route::delete('/flower-decorators/packages/{id}', [FlowerDecoratorController::class, 'destroyPackage'])->name('flower-decorators.packages.destroy');

// اللافتات الراعية لديكورات الزهور
Route::post('/flower-decorators/sponsor-banners', [FlowerDecoratorController::class, 'storeSponsorBanner'])->name('flower-decorators.sponsor-banners.store');
Route::delete('/flower-decorators/sponsor-banners/{id}', [FlowerDecoratorController::class, 'destroySponsorBanner'])->name('flower-decorators.sponsor-banners.destroy');

// إعلانات فيديو ديكورات الزهور
Route::post('/flower-decorators/video-ads', [FlowerDecoratorController::class, 'storeVideoAd'])->name('flower-decorators.video-ads.store');
Route::delete('/flower-decorators/video-ads/{id}', [FlowerDecoratorController::class, 'destroyVideoAd'])->name('flower-decorators.video-ads.destroy');

// موردو هدايا الزفاف التذكارية
Route::get('/wedding-gift-suppliers', [App\Http\Controllers\WeddingGiftSupplierController::class, 'index'])->name('wedding-gift-suppliers.index');
Route::post('/wedding-gift-suppliers', [App\Http\Controllers\WeddingGiftSupplierController::class, 'store'])->name('wedding-gift-suppliers.store');
Route::put('/wedding-gift-suppliers/{id}', [App\Http\Controllers\WeddingGiftSupplierController::class, 'update'])->name('wedding-gift-suppliers.update');
Route::delete('/wedding-gift-suppliers/{id}', [App\Http\Controllers\WeddingGiftSupplierController::class, 'destroy'])->name('wedding-gift-suppliers.destroy');

// معارض منتجات الهدايا
Route::post('/wedding-gift-suppliers/gallery', [App\Http\Controllers\WeddingGiftSupplierController::class, 'storeGallery'])->name('wedding-gift-suppliers.gallery.store');
Route::delete('/wedding-gift-suppliers/gallery/{id}', [App\Http\Controllers\WeddingGiftSupplierController::class, 'destroyGallery'])->name('wedding-gift-suppliers.gallery.destroy');

// أفكار الهدايا
Route::post('/wedding-gift-suppliers/idea', [App\Http\Controllers\WeddingGiftSupplierController::class, 'storeIdea'])->name('wedding-gift-suppliers.idea.store');
Route::delete('/wedding-gift-suppliers/idea/{id}', [App\Http\Controllers\WeddingGiftSupplierController::class, 'destroyIdea'])->name('wedding-gift-suppliers.idea.destroy');

// روتات مصممي فساتين الزفاف
Route::prefix('admin/wedding-dress-designers')->group(function () {
    Route::post('/', [WeddingDressDesignerController::class, 'store'])->name('wedding-dress-designers.store');
    Route::put('/{designer}', [WeddingDressDesignerController::class, 'update'])->name('wedding-dress-designers.update');
    Route::delete('/{designer}', [WeddingDressDesignerController::class, 'destroy'])->name('wedding-dress-designers.destroy');
    
    // روتات العروض
    Route::post('/offer', [WeddingDressDesignerController::class, 'storeOffer'])->name('wedding-dress-designers.offer.store');
    Route::delete('/offer/{offer}', [WeddingDressDesignerController::class, 'destroyOffer'])->name('wedding-dress-designers.offer.destroy');
    
    // روتات إعلانات الفيديو
    Route::post('/video-ad', [WeddingDressDesignerController::class, 'storeVideoAd'])->name('wedding-dress-designers.video-ad.store');
    Route::delete('/video-ad/{videoAd}', [WeddingDressDesignerController::class, 'destroyVideoAd'])->name('wedding-dress-designers.video-ad.destroy');
    
    // روتات اللافتات
    Route::post('/banner', [WeddingDressDesignerController::class, 'storeBanner'])->name('wedding-dress-designers.banner.store');
    Route::delete('/banner/{banner}', [WeddingDressDesignerController::class, 'destroyBanner'])->name('wedding-dress-designers.banner.destroy');
    
    // روتات المراجع
    Route::post('/reference', [WeddingDressDesignerController::class, 'storeReference'])->name('wedding-dress-designers.reference.store');
    Route::delete('/reference/{reference}', [WeddingDressDesignerController::class, 'destroyReference'])->name('wedding-dress-designers.reference.destroy');
});

// مسارات صفحة "كيف تكونين أمًا"
Route::prefix('admin/how-to-be-mom')->group(function () {
    Route::get('/', [App\Http\Controllers\HowToBeMomController::class, 'index'])->name('how-to-be-mom.index');
    
    // نصائح الخبراء
    Route::post('/expert-advice', [App\Http\Controllers\HowToBeMomController::class, 'storeExpertAdvice'])->name('how-to-be-mom.expert-advice.store');
    Route::get('/expert-advice', [App\Http\Controllers\HowToBeMomController::class, 'getExpertAdvice'])->name('how-to-be-mom.expert-advice.get');
    
    // نصائح الجدات
    Route::post('/grandma-advice', [App\Http\Controllers\HowToBeMomController::class, 'storeGrandmaAdvice'])->name('how-to-be-mom.grandma-advice.store');
    Route::get('/grandma-advice', [App\Http\Controllers\HowToBeMomController::class, 'getGrandmaAdvice'])->name('how-to-be-mom.grandma-advice.get');
    
    // حلقات البودكاست
    Route::post('/podcast', [App\Http\Controllers\HowToBeMomController::class, 'storePodcastEpisode'])->name('how-to-be-mom.podcast.store');
    Route::get('/podcast', [App\Http\Controllers\HowToBeMomController::class, 'getPodcastEpisodes'])->name('how-to-be-mom.podcast.get');
    
    // الإحصائيات
    Route::get('/stats', [App\Http\Controllers\HowToBeMomController::class, 'getStats'])->name('how-to-be-mom.stats');
});

// Route for skin-care-doctors.tips
Route::post('/skin-care-doctors/tips', [App\Http\Controllers\SkinCareDoctorController::class, 'addTip'])->name('skin-care-doctors.tips');

// Route for skin-care-doctors.videos
Route::post('/skin-care-doctors/videos', [App\Http\Controllers\SkinCareDoctorController::class, 'addVideo'])->name('skin-care-doctors.videos');

// إضافة route لمعالجة إضافة طفل جديد في لوحة الإدارة باسم admin.babies.store
Route::post('/admin/welcome-baby/add', [App\Http\Controllers\AdminWelcomeBabyController::class, 'store'])->name('admin.babies.store');

// مسارات قسم ايفينتاتى
Route::prefix('eventaty')->group(function () {
    Route::get('/', [App\Http\Controllers\EventatyController::class, 'index'])->name('eventaty.index');
    Route::get('/search', [App\Http\Controllers\EventatyController::class, 'search'])->name('eventaty.search');
    Route::get('/events/{id}', [App\Http\Controllers\EventatyController::class, 'show'])->name('eventaty.show');
    Route::get('/events/{id}/book', [App\Http\Controllers\EventatyController::class, 'bookingForm'])->name('eventaty.booking.form');
    Route::post('/events/{id}/book', [App\Http\Controllers\EventatyController::class, 'storeBooking'])->name('eventaty.booking.store');
    Route::get('/bookings/{bookingId}/success', [App\Http\Controllers\EventatyController::class, 'bookingSuccess'])->name('eventaty.booking.success');
});

// مسارات قسم فورصى
Route::prefix('forasy')->group(function () {
    Route::get('/', [App\Http\Controllers\ForasyController::class, 'index'])->name('forasy.index');
    Route::get('/jobs/{id}', [App\Http\Controllers\ForasyController::class, 'showJob'])->name('forasy.jobs.show');
    Route::get('/advices/{id}', [App\Http\Controllers\ForasyController::class, 'showAdvice'])->name('forasy.advices.show');
});

// مسارات قسم هديتي
Route::get('/hadiety', [App\Http\Controllers\HadietyController::class, 'index'])->name('hadiety.index');
Route::get('/hadiety/guide/{id}', [App\Http\Controllers\HadietyController::class, 'showGuide'])->name('hadiety.guide.show');
Route::post('/hadiety/service-request', [App\Http\Controllers\HadietyController::class, 'storeServiceRequest'])->name('hadiety.service.request');

// مسارات قسم بيتي
Route::get('/beity', [App\Http\Controllers\BeityController::class, 'index'])->name('beity.index');
Route::get('/beity/design/{id}', [App\Http\Controllers\BeityController::class, 'showDesign'])->name('beity.design.show');

// مسارات قسم حساباتى
Route::middleware('auth')->group(function () {
    Route::get('/hesabaty', [App\Http\Controllers\HesabatyController::class, 'index'])->name('hesabaty.index');
    Route::post('/hesabaty/income', [App\Http\Controllers\HesabatyController::class, 'storeIncome'])->name('hesabaty.income.store');
    Route::post('/hesabaty/expense', [App\Http\Controllers\HesabatyController::class, 'storeExpense'])->name('hesabaty.expense.store');
    Route::post('/hesabaty/goal', [App\Http\Controllers\HesabatyController::class, 'storeGoal'])->name('hesabaty.goal.store');
    Route::post('/hesabaty/bill', [App\Http\Controllers\HesabatyController::class, 'storeBill'])->name('hesabaty.bill.store');
});

// مسارات قسم رياضتي
Route::get('/riadaty', [App\Http\Controllers\RiadatyController::class, 'index'])->name('riadaty.index');
Route::post('/riadaty/plan/start', [App\Http\Controllers\RiadatyController::class, 'startPlan'])->name('riadaty.plan.start');
Route::post('/riadaty/challenge/join', [App\Http\Controllers\RiadatyController::class, 'joinChallenge'])->name('riadaty.challenge.join');

// مسارات قسم مشروعي
Route::get('/mashroay', [App\Http\Controllers\MashroayController::class, 'index'])->name('mashroay.index');
Route::get('/mashroay/idea/{id}', [App\Http\Controllers\MashroayController::class, 'showIdea'])->name('mashroay.idea.show');
Route::get('/mashroay/advice/{id}', [App\Http\Controllers\MashroayController::class, 'showAdvice'])->name('mashroay.advice.show');

// مسارات قسم مستشاري
Route::get('/mostashary', [App\Http\Controllers\MostasharyController::class, 'index'])->name('mostashary.index');

// مسارات قسم مستمعي
Route::get('/mostamay', [App\Http\Controllers\MostamayController::class, 'index'])->name('mostamay.index');
Route::get('/mostamay/motivational/{id}', [App\Http\Controllers\MostamayController::class, 'showMotivational'])->name('mostamay.motivational.show');
Route::get('/mostamay/skill/{id}', [App\Http\Controllers\MostamayController::class, 'showSkill'])->name('mostamay.skill.show');
Route::get('/mostamay/story/{id}', [App\Http\Controllers\MostamayController::class, 'showStory'])->name('mostamay.story.show');
Route::get('/mostamay/post/{id}', [App\Http\Controllers\MostamayController::class, 'showPost'])->name('mostamay.post.show');

// مسارات قسم نساء الغد
Route::get('/nesaa-alghad', [App\Http\Controllers\NesaaAlghadController::class, 'index'])->name('nesaa-alghad.index');
Route::get('/nesaa-alghad/story/{id}', [App\Http\Controllers\NesaaAlghadController::class, 'showStory'])->name('nesaa-alghad.story.show');

// Articles Routes
Route::get('/articles', [App\Http\Controllers\ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{slug}', [App\Http\Controllers\ArticleController::class, 'show'])->name('articles.show');

// Comments Routes
Route::post('/comments', [App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');
Route::get('/comments/{blogId}', [App\Http\Controllers\CommentController::class, 'getComments'])->name('comments.get');
Route::get('/nesaa-alghad', [App\Http\Controllers\NesaaAlghadController::class, 'index'])->name('nesaa-alghad.index');
