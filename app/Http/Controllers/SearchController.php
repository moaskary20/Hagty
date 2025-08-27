<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Student;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Pharmacy;
use App\Models\HealthTip;
use App\Models\FashionTrend;
use App\Models\SponsorVideo;
use App\Models\ForasyCourse;
use App\Models\Baby;
use App\Models\WeddingDressDesigner;
use App\Models\WeddingPlanner;
use App\Models\MakeupArtist;
use App\Models\WeddingHairStylist;
use App\Models\WeddingVenue;
use App\Models\CateringService;
use App\Models\DjPerformer;
use App\Models\FlowerDecorator;
use App\Models\WeddingGiftSupplier;
use App\Models\WeddingPhotographer;
use App\Models\PlasticSurgeon;
use App\Models\HairStylist;
use App\Models\BeautyShop;
use App\Models\BeautyTip;
use App\Models\SkinCareDoctor;
use App\Models\NailLashSpecialist;
use App\Models\NutritionDoctor;
use App\Models\SpaClinic;
use App\Models\TrainingVideo;
use App\Models\AccessoratyShop;
use App\Models\AccessoratyBannerAd;
use App\Models\AccessoratySponsorVideo;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->get('q');
        $section = $request->get('section', 'all');
        
        if (empty($query)) {
            return redirect()->back();
        }

        $results = [];
        
        // البحث في جميع الأقسام أو قسم محدد
        if ($section === 'all' || $section === 'accessoraty') {
            $results['accessoraty'] = [
                'courses' => Course::where('name', 'LIKE', "%{$query}%")
                    ->orWhere('description', 'LIKE', "%{$query}%")
                    ->withCount('students')->get(),
                'students' => Student::where('name', 'LIKE', "%{$query}%")
                    ->orWhere('email', 'LIKE', "%{$query}%")
                    ->with('course')->get(),
                'shops' => AccessoratyShop::where('brand_name', 'LIKE', "%{$query}%")
                    ->orWhere('location', 'LIKE', "%{$query}%")
                    ->orWhere('category', 'LIKE', "%{$query}%")->get(),
                'banner_ads' => AccessoratyBannerAd::where('title', 'LIKE', "%{$query}%")
                    ->orWhere('location', 'LIKE', "%{$query}%")->get(),
                'sponsor_videos' => AccessoratySponsorVideo::where('title', 'LIKE', "%{$query}%")
                    ->orWhere('duration', 'LIKE', "%{$query}%")->get(),
            ];
        }

        if ($section === 'all' || $section === 'health') {
            $results['health'] = [
                'doctors' => Doctor::where('first_name', 'LIKE', "%{$query}%")
                    ->orWhere('last_name', 'LIKE', "%{$query}%")
                    ->orWhere('specialty', 'LIKE', "%{$query}%")
                    ->orWhere('clinic_address', 'LIKE', "%{$query}%")->get(),
                'hospitals' => Hospital::where('name', 'LIKE', "%{$query}%")
                    ->orWhere('address', 'LIKE', "%{$query}%")
                    ->orWhere('specialty', 'LIKE', "%{$query}%")->get(),
                'pharmacies' => Pharmacy::where('name', 'LIKE', "%{$query}%")
                    ->orWhere('address', 'LIKE', "%{$query}%")->get(),
                'health_tips' => HealthTip::where('title', 'LIKE', "%{$query}%")
                    ->orWhere('description', 'LIKE', "%{$query}%")->get(),
            ];
        }

        if ($section === 'all' || $section === 'fashion') {
            $results['fashion'] = [
                'fashion_trends' => FashionTrend::where('title', 'LIKE', "%{$query}%")
                    ->orWhere('content', 'LIKE', "%{$query}%")->get(),
                'sponsor_videos' => SponsorVideo::where('عنوان_الفيديو', 'LIKE', "%{$query}%")->get(),
                'forasy_courses' => ForasyCourse::where('name', 'LIKE', "%{$query}%")
                    ->orWhere('description', 'LIKE', "%{$query}%")->get(),
            ];
        }

        if ($section === 'all' || $section === 'babies') {
            $results['babies'] = [
                'babies' => Baby::where('name', 'LIKE', "%{$query}%")
                    ->orWhere('health_info', 'LIKE', "%{$query}%")->get(),
            ];
        }

        if ($section === 'all' || $section === 'wedding') {
            $results['wedding'] = [
                'wedding_designers' => WeddingDressDesigner::where('name', 'LIKE', "%{$query}%")
                    ->orWhere('specialty', 'LIKE', "%{$query}%")->get(),
                'wedding_planners' => WeddingPlanner::where('name', 'LIKE', "%{$query}%")
                    ->orWhere('brand', 'LIKE', "%{$query}%")
                    ->orWhere('location', 'LIKE', "%{$query}%")
                    ->orWhere('package', 'LIKE', "%{$query}%")->get(),
                'makeup_artists' => MakeupArtist::where('name', 'LIKE', "%{$query}%")
                    ->orWhere('address', 'LIKE', "%{$query}%")
                    ->orWhere('description', 'LIKE', "%{$query}%")->get(),
                'wedding_hair_stylists' => WeddingHairStylist::where('name', 'LIKE', "%{$query}%")
                    ->orWhere('address', 'LIKE', "%{$query}%")
                    ->orWhere('package', 'LIKE', "%{$query}%")
                    ->orWhere('description', 'LIKE', "%{$query}%")->get(),
                'wedding_venues' => WeddingVenue::where('name', 'LIKE', "%{$query}%")
                    ->orWhere('address', 'LIKE', "%{$query}%")
                    ->orWhere('description', 'LIKE', "%{$query}%")->get(),
                'catering_services' => CateringService::where('company_name', 'LIKE', "%{$query}%")
                    ->orWhere('address', 'LIKE', "%{$query}%")
                    ->orWhere('description', 'LIKE', "%{$query}%")->get(),
                'dj_performers' => DjPerformer::where('name', 'LIKE', "%{$query}%")
                    ->orWhere('specialty', 'LIKE', "%{$query}%")
                    ->orWhere('description', 'LIKE', "%{$query}%")->get(),
                'flower_decorators' => FlowerDecorator::where('name', 'LIKE', "%{$query}%")
                    ->orWhere('specialty', 'LIKE', "%{$query}%")
                    ->orWhere('address', 'LIKE', "%{$query}%")
                    ->orWhere('description', 'LIKE', "%{$query}%")->get(),
                'wedding_gift_suppliers' => WeddingGiftSupplier::where('name', 'LIKE', "%{$query}%")
                    ->orWhere('specialty', 'LIKE', "%{$query}%")
                    ->orWhere('address', 'LIKE', "%{$query}%")
                    ->orWhere('description', 'LIKE', "%{$query}%")->get(),
                'wedding_photographers' => WeddingPhotographer::where('name', 'LIKE', "%{$query}%")
                    ->orWhere('specialty', 'LIKE', "%{$query}%")
                    ->orWhere('description', 'LIKE', "%{$query}%")->get(),
            ];
        }

        if ($section === 'all' || $section === 'beauty') {
            $results['beauty'] = [
                'plastic_surgeons' => PlasticSurgeon::where('name', 'LIKE', "%{$query}%")
                    ->orWhere('specialty', 'LIKE', "%{$query}%")->get(),
                'hair_stylists' => HairStylist::where('name', 'LIKE', "%{$query}%")
                    ->orWhere('location', 'LIKE', "%{$query}%")->get(),
                'beauty_shops' => BeautyShop::where('brand_name', 'LIKE', "%{$query}%")
                    ->orWhere('location', 'LIKE', "%{$query}%")->get(),
                'beauty_trends' => BeautyTip::where('tip', 'LIKE', "%{$query}%")->get(),
                'skin_care_doctors' => SkinCareDoctor::where('name', 'LIKE', "%{$query}%")
                    ->orWhere('specialty', 'LIKE', "%{$query}%")->get(),
                'nail_lash_specialists' => NailLashSpecialist::where('name', 'LIKE', "%{$query}%")
                    ->orWhere('specialty', 'LIKE', "%{$query}%")
                    ->orWhere('center_address', 'LIKE', "%{$query}%")->get(),
                'nutrition_doctors' => NutritionDoctor::where('name', 'LIKE', "%{$query}%")
                    ->orWhere('specialty', 'LIKE', "%{$query}%")->get(),
                'spa_clinics' => SpaClinic::where('name', 'LIKE', "%{$query}%")
                    ->orWhere('specialty', 'LIKE', "%{$query}%")
                    ->orWhere('center_address', 'LIKE', "%{$query}%")->get(),
                'training_videos' => TrainingVideo::where('عنوان_الفيديو', 'LIKE', "%{$query}%")
                    ->orWhere('وصف_الفيديو', 'LIKE', "%{$query}%")->get(),
            ];
        }

        // حساب إجمالي النتائج
        $totalResults = 0;
        foreach ($results as $sectionResults) {
            foreach ($sectionResults as $items) {
                $totalResults += $items->count();
            }
        }

        return view('search.results', compact('results', 'query', 'section', 'totalResults'));
    }
}
