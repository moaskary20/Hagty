<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
use App\Models\Course;
use App\Models\Student;
use App\Models\AccessoratyShop;

class SectionSearchController extends Controller
{
    public function searchHealth(Request $request)
    {
        $query = $request->get('q');
        
        if (empty($query)) {
            return redirect()->route('section.health');
        }

        $results = [
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

        $totalResults = 0;
        foreach ($results as $items) {
            $totalResults += $items->count();
        }

        return view('search.health-results', compact('results', 'query', 'totalResults'));
    }

    public function searchFashion(Request $request)
    {
        $query = $request->get('q');
        
        if (empty($query)) {
            return redirect()->route('section.fashion');
        }

        $results = [
            'fashion_trends' => FashionTrend::where('العنوان', 'LIKE', "%{$query}%")
                ->orWhere('الوصف', 'LIKE', "%{$query}%")
                ->orWhere('الفئة', 'LIKE', "%{$query}%")->get(),
            'sponsor_videos' => SponsorVideo::where('عنوان_الفيديو', 'LIKE', "%{$query}%")
                ->orWhere('وصف_الفيديو', 'LIKE', "%{$query}%")
                ->orWhere('نوع_الفيديو', 'LIKE', "%{$query}%")->get(),
            'forasy_courses' => ForasyCourse::where('name', 'LIKE', "%{$query}%")
                ->orWhere('description', 'LIKE', "%{$query}%")
                ->orWhere('instructor', 'LIKE', "%{$query}%")->get(),
        ];

        $totalResults = 0;
        foreach ($results as $items) {
            $totalResults += $items->count();
        }

        return view('search.fashion-results', compact('results', 'query', 'totalResults'));
    }

    public function searchBabies(Request $request)
    {
        $query = $request->get('q');
        
        if (empty($query)) {
            return redirect()->route('section.babies');
        }

        $results = [
            'babies' => Baby::where('name', 'LIKE', "%{$query}%")
                ->orWhere('health_info', 'LIKE', "%{$query}%")->get(),
        ];

        $totalResults = 0;
        foreach ($results as $items) {
            $totalResults += $items->count();
        }

        return view('search.babies-results', compact('results', 'query', 'totalResults'));
    }

    public function searchWedding(Request $request)
    {
        $query = $request->get('q');
        
        if (empty($query)) {
            return redirect()->route('section.wedding');
        }

        $results = [
            'wedding_designers' => WeddingDressDesigner::where('name', 'LIKE', "%{$query}%")
                ->orWhere('description', 'LIKE', "%{$query}%")
                ->orWhere('specialty', 'LIKE', "%{$query}%")->get(),
            'wedding_planners' => WeddingPlanner::where('name', 'LIKE', "%{$query}%")
                ->orWhere('description', 'LIKE', "%{$query}%")->get(),
            'makeup_artists' => MakeupArtist::where('name', 'LIKE', "%{$query}%")
                ->orWhere('description', 'LIKE', "%{$query}%")->get(),
            'wedding_hair_stylists' => WeddingHairStylist::where('name', 'LIKE', "%{$query}%")
                ->orWhere('description', 'LIKE', "%{$query}%")->get(),
            'wedding_venues' => WeddingVenue::where('name', 'LIKE', "%{$query}%")
                ->orWhere('address', 'LIKE', "%{$query}%")
                ->orWhere('description', 'LIKE', "%{$query}%")->get(),
            'catering_services' => CateringService::where('company_name', 'LIKE', "%{$query}%")
                ->orWhere('description', 'LIKE', "%{$query}%")->get(),
            'dj_performers' => DjPerformer::where('name', 'LIKE', "%{$query}%")
                ->orWhere('description', 'LIKE', "%{$query}%")->get(),
            'flower_decorators' => FlowerDecorator::where('name', 'LIKE', "%{$query}%")
                ->orWhere('description', 'LIKE', "%{$query}%")->get(),
            'wedding_gift_suppliers' => WeddingGiftSupplier::where('name', 'LIKE', "%{$query}%")
                ->orWhere('description', 'LIKE', "%{$query}%")->get(),
            'wedding_photographers' => WeddingPhotographer::where('name', 'LIKE', "%{$query}%")
                ->orWhere('description', 'LIKE', "%{$query}%")
                ->orWhere('specialty', 'LIKE', "%{$query}%")->get(),
        ];

        $totalResults = 0;
        foreach ($results as $items) {
            $totalResults += $items->count();
        }

        return view('search.wedding-results', compact('results', 'query', 'totalResults'));
    }

    public function searchBeauty(Request $request)
    {
        $query = $request->get('q');
        
        if (empty($query)) {
            return redirect()->route('section.beauty');
        }

        $results = [
            'plastic_surgeons' => PlasticSurgeon::where('name', 'LIKE', "%{$query}%")
                ->orWhere('description', 'LIKE', "%{$query}%")->get(),
            'hair_stylists' => HairStylist::where('name', 'LIKE', "%{$query}%")
                ->orWhere('description', 'LIKE', "%{$query}%")->get(),
            'beauty_shops' => BeautyShop::where('name', 'LIKE', "%{$query}%")
                ->orWhere('description', 'LIKE', "%{$query}%")->get(),
            'beauty_trends' => BeautyTip::where('tip', 'LIKE', "%{$query}%")->get(),
            'skin_care_doctors' => SkinCareDoctor::where('name', 'LIKE', "%{$query}%")
                ->orWhere('description', 'LIKE', "%{$query}%")->get(),
            'nail_lash_specialists' => NailLashSpecialist::where('name', 'LIKE', "%{$query}%")
                ->orWhere('description', 'LIKE', "%{$query}%")->get(),
            'nutrition_doctors' => NutritionDoctor::where('name', 'LIKE', "%{$query}%")
                ->orWhere('description', 'LIKE', "%{$query}%")->get(),
            'spa_clinics' => SpaClinic::where('name', 'LIKE', "%{$query}%")
                ->orWhere('description', 'LIKE', "%{$query}%")->get(),
            'training_videos' => TrainingVideo::where('عنوان_الفيديو', 'LIKE', "%{$query}%")
                ->orWhere('وصف_الفيديو', 'LIKE', "%{$query}%")->get(),
        ];

        $totalResults = 0;
        foreach ($results as $items) {
            $totalResults += $items->count();
        }

        return view('search.beauty-results', compact('results', 'query', 'totalResults'));
    }

    public function searchAccessoraty(Request $request)
    {
        $query = $request->get('q');
        
        if (empty($query)) {
            return redirect()->route('section.accessoraty');
        }

        $results = [
            'courses' => Course::where('name', 'LIKE', "%{$query}%")
                ->orWhere('description', 'LIKE', "%{$query}%")
                ->withCount('students')->get(),
            'students' => Student::where('name', 'LIKE', "%{$query}%")
                ->orWhere('email', 'LIKE', "%{$query}%")
                ->with('course')->get(),
            'accessoraty_shops' => AccessoratyShop::where('brand_name', 'LIKE', "%{$query}%")
                ->orWhere('location', 'LIKE', "%{$query}%")->get(),
        ];

        $totalResults = 0;
        foreach ($results as $items) {
            $totalResults += $items->count();
        }

        return view('search.accessoraty-results', compact('results', 'query', 'totalResults'));
    }
}
