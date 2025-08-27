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
use App\Models\DjWeddingPackage;
use App\Models\DjBanner;
use App\Models\DjVideoAd;
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
use App\Models\MaternityDoctor;
use App\Models\WeeklyBabyCare;
use App\Models\DeliveryPreparation;
use App\Models\Hotel;
use App\Models\TourismOffice;
use App\Models\TravelOffer;
use App\Models\WomenCamp;
use App\Models\CalendarEvent;
use App\Models\FamilyAdvice;
use App\Models\FamilyActivity;
use App\Models\FamilyOutingArea;
use App\Models\FamilyHealthRecord;

class HomeController extends Controller
{
    public function index()
    {
        // جمع البيانات من جميع الأقسام
        $data = [
            // أكسسوراتى
            'courses' => Course::withCount('students')->take(6)->get(),
            'students_count' => Student::count(),
            'courses_count' => Course::count(),
            
            // الصحة
            'doctors' => Doctor::take(6)->get(),
            'hospitals' => Hospital::take(6)->get(),
            'pharmacies' => Pharmacy::take(6)->get(),
            'health_tips' => HealthTip::take(6)->get(),
            
            // الموضة
            'fashion_trends' => FashionTrend::with('category')->take(6)->get(),
            'sponsor_videos' => SponsorVideo::take(6)->get(),
            'forasy_courses' => ForasyCourse::take(6)->get(),
            
            // الأطفال
            'babies' => Baby::take(6)->get(),
            
            // الزفاف
            'wedding_designers' => WeddingDressDesigner::take(6)->get(),
            'wedding_planners' => WeddingPlanner::take(6)->get(),
            'makeup_artists' => MakeupArtist::take(6)->get(),
            'wedding_hair_stylists' => WeddingHairStylist::take(6)->get(),
            'wedding_venues' => WeddingVenue::take(6)->get(),
            'catering_services' => CateringService::take(6)->get(),
            'dj_performers' => DjPerformer::take(6)->get(),
            'flower_decorators' => FlowerDecorator::take(6)->get(),
            'wedding_gift_suppliers' => WeddingGiftSupplier::take(6)->get(),
            'wedding_photographers' => WeddingPhotographer::take(6)->get(),
            
            // الجمال
            'plastic_surgeons' => PlasticSurgeon::take(6)->get(),
            'hair_stylists' => HairStylist::take(6)->get(),
            'beauty_shops' => BeautyShop::take(6)->get(),
            'beauty_trends' => BeautyTip::take(6)->get(),
            'skin_care_doctors' => SkinCareDoctor::take(6)->get(),
            'nail_lash_specialists' => NailLashSpecialist::take(6)->get(),
            'nutrition_doctors' => NutritionDoctor::take(6)->get(),
            'spa_clinics' => SpaClinic::take(6)->get(),
            'training_videos' => TrainingVideo::take(6)->get(),
            
            // أكسسوراتى
            'accessoraty_shops' => AccessoratyShop::take(6)->get(),
            'accessoraty_banners' => AccessoratyBannerAd::take(6)->get(),
            'accessoraty_videos' => AccessoratySponsorVideo::take(6)->get(),
            
            // أومومتي
            'maternity_doctors' => MaternityDoctor::take(6)->get(),
            'weekly_baby_cares' => WeeklyBabyCare::take(6)->get(),
            'delivery_preparations' => DeliveryPreparation::take(6)->get(),
        ];

        return view('home', $data);
    }

    public function section($section)
    {
        $sections = [
            'accessoraty' => 'أكسسوراتى',
            'health' => 'الصحة',
            'fashion' => 'الموضة',
            'babies' => 'الأطفال',
            'wedding' => 'الزفاف',
            'beauty' => 'الجمال',
            'umomi' => 'أومومتي',
            'rehlaaty' => 'رحلات',
            'family' => 'الأسرة',
            'joy' => 'الفرح',
        ];

        if (!array_key_exists($section, $sections)) {
            abort(404);
        }

        $sectionName = $sections[$section];
        
        // جمع البيانات حسب القسم
        $data = $this->getSectionData($section);
        
        return view('sections.' . $section, array_merge($data, [
            'section_name' => $sectionName,
            'section_slug' => $section
        ]));
    }

    private function getSectionData($section)
    {
        switch ($section) {
            case 'accessoraty':
                return [
                    'courses' => Course::withCount('students')->get(),
                    'students' => Student::with('course')->get(),
                    'shops' => AccessoratyShop::all(),
                    'banners' => AccessoratyBannerAd::all(),
                    'videos' => AccessoratySponsorVideo::all(),
                ];
                
            case 'health':
                return [
                    'doctors' => Doctor::all(),
                    'hospitals' => Hospital::all(),
                    'pharmacies' => Pharmacy::all(),
                    'health_tips' => HealthTip::all(),
                ];
                
            case 'fashion':
                return [
                    'fashion_trends' => FashionTrend::all(),
                    'sponsor_videos' => SponsorVideo::all(),
                    'forasy_courses' => ForasyCourse::all(),
                ];
                
            case 'babies':
                return [
                    'babies' => Baby::all(),
                ];
                
            case 'wedding':
                return [
                    'wedding_designers' => WeddingDressDesigner::all(),
                    'wedding_planners' => WeddingPlanner::all(),
                    'makeup_artists' => MakeupArtist::all(),
                    'wedding_hair_stylists' => WeddingHairStylist::all(),
                    'wedding_venues' => WeddingVenue::all(),
                    'catering_services' => CateringService::all(),
                    'dj_performers' => DjPerformer::all(),
                    'flower_decorators' => FlowerDecorator::all(),
                    'wedding_gift_suppliers' => WeddingGiftSupplier::all(),
                    'wedding_photographers' => WeddingPhotographer::all(),
                ];
                
                case 'beauty':
                    return [
                        'plastic_surgeons' => PlasticSurgeon::all(),
                        'hair_stylists' => HairStylist::all(),
                        'beauty_shops' => BeautyShop::all(),
                        'beauty_trends' => BeautyTip::all(),
                        'skin_care_doctors' => SkinCareDoctor::all(),
                        'nail_lash_specialists' => NailLashSpecialist::all(),
                        'nutrition_doctors' => NutritionDoctor::all(),
                        'spa_clinics' => SpaClinic::all(),
                        'training_videos' => TrainingVideo::all(),
                    ];
                
            case 'umomi':
                return [
                    'maternity_doctors' => MaternityDoctor::all(),
                    'weekly_baby_cares' => WeeklyBabyCare::all(),
                    'delivery_preparations' => DeliveryPreparation::all(),
                ];
                
            case 'rehlaaty':
                return [
                    'hotels' => Hotel::all(),
                    'tourism_offices' => TourismOffice::all(),
                    'travel_offers' => TravelOffer::all(),
                    'women_camps' => WomenCamp::all(),
                    'calendar_events' => CalendarEvent::all(),
                ];
                
            case 'family':
                return [
                    'family_advices' => FamilyAdvice::all(),
                    'family_activities' => FamilyActivity::all(),
                    'family_outing_areas' => FamilyOutingArea::all(),
                    'family_health_records' => FamilyHealthRecord::all(),
                ];
                
            case 'joy':
                return [
                    'dj_wedding_packages' => DjWeddingPackage::all(),
                    'dj_banners' => DjBanner::all(),
                    'dj_video_ads' => DjVideoAd::all(),
                ];
                
            default:
                return [];
        }
    }
}
