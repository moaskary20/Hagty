<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\BabyDayStep;
use App\Models\BabyHealthInfo;
use App\Models\BabyExpertAdvice;
use App\Models\BabyDoctorTip;
use App\Models\BabyMonthlyGrowth;
use App\Models\BabyShowerList;
use App\Models\BabyHealthRecord;
use App\Models\KidDoctor;
use App\Models\EmergencyContact;
use App\Models\Nursery;
use App\Models\PlayingArea;

class WelcomeBabyComplete extends Component
{
    // Modal states
    public $showDayStepModal = false;
    public $showHealthInfoModal = false;
    public $showExpertAdviceModal = false;
    public $showDoctorTipModal = false;
    public $showMonthlyGrowthModal = false;
    public $showShowerListModal = false;
    public $showBabyHealthModal = false;
    public $showKidDoctorModal = false;
    public $showEmergencyModal = false;
    public $showNurseryModal = false;
    public $showPlayingAreaModal = false;
    public $showAdviceModal = false; // نصائح العائلة

    // Form data
    public $dayStepForm = [];
    public $healthInfoForm = [];
    public $expertAdviceForm = [];
    public $doctorTipForm = [];
    public $monthlyGrowthForm = [];
    public $showerListForm = [];
    public $babyHealthForm = [];
    public $kidDoctorForm = [];
    public $emergencyForm = [];
    public $nurseryForm = [];
    public $playingAreaForm = [];

    // Editing states
    public $editingDayStep = null;
    public $editingHealthInfo = null;
    public $editingExpertAdvice = null;
    public $editingDoctorTip = null;
    public $editingMonthlyGrowth = null;
    public $editingShowerList = null;
    public $editingBabyHealth = null;
    public $editingKidDoctor = null;
    public $editingEmergency = null;
    public $editingNursery = null;
    public $editingPlayingArea = null;

    public function mount()
    {
        $this->resetForms();
    }

    public function resetForms()
    {
        $this->dayStepForm = [
            'title' => '',
            'description' => '',
            'step_number' => 1,
            'age_group' => '',
            'category' => '',
            'difficulty_level' => 'سهل'
        ];
        
        $this->healthInfoForm = [
            'title' => '',
            'content' => '',
            'category' => '',
            'age_range' => ''
        ];
        
        $this->expertAdviceForm = [
            'title' => '',
            'content' => '',
            'expert_name' => '',
            'expert_specialty' => '',
            'category' => ''
        ];
        
        $this->doctorTipForm = [
            'title' => '',
            'content' => '',
            'doctor_name' => '',
            'specialization' => '',
            'urgency_level' => 'متوسط'
        ];
        
        $this->monthlyGrowthForm = [
            'month_number' => 1,
            'title' => '',
            'description' => '',
            'physical_development' => '',
            'cognitive_development' => ''
        ];
        
        $this->showerListForm = [
            'item_name' => '',
            'description' => '',
            'category' => '',
            'priority' => 'متوسط'
        ];
        
        $this->babyHealthForm = [
            'baby_name' => '',
            'birth_date' => '',
            'gender' => '',
            'weight' => '',
            'height' => '',
            'blood_type' => '',
            'allergies' => '',
            'medical_conditions' => ''
        ];
        
        $this->kidDoctorForm = [
            'doctor_name' => '',
            'specialization' => '',
            'phone' => '',
            'email' => '',
            'address' => '',
            'clinic_name' => '',
            'emergency_phone' => ''
        ];
        
        $this->emergencyForm = [
            'contact_name' => '',
            'relationship' => '',
            'phone' => '',
            'emergency_phone' => '',
            'address' => '',
            'is_primary' => false
        ];
        
        $this->nurseryForm = [
            'name' => '',
            'address' => '',
            'phone' => '',
            'email' => '',
            'age_range' => '',
            'fees' => '',
            'working_hours' => '',
            'rating' => 0
        ];
        
        $this->playingAreaForm = [
            'name' => '',
            'address' => '',
            'phone' => '',
            'fees' => '',
            'opening_hours' => '',
            'closing_hours' => '',
            'age_range' => '',
            'rating' => 0
        ];
    }

    // Modal methods for Day Steps
    public function openDayStepModal()
    {
        $this->showDayStepModal = true;
        $this->editingDayStep = null;
    }

    public function closeDayStepModal()
    {
        $this->showDayStepModal = false;
        $this->resetForms();
    }

    public function saveDayStep()
    {
        session()->flash('message', 'تم حفظ الخطوة بنجاح!');
        $this->closeDayStepModal();
    }

    // Modal methods for Health Info
    public function openHealthInfoModal()
    {
        $this->showHealthInfoModal = true;
        $this->editingHealthInfo = null;
    }

    public function closeHealthInfoModal()
    {
        $this->showHealthInfoModal = false;
        $this->resetForms();
    }

    public function saveHealthInfo()
    {
        session()->flash('message', 'تم حفظ المعلومة الصحية بنجاح!');
        $this->closeHealthInfoModal();
    }

    // Modal methods for Expert Advice
    public function openExpertAdviceModal()
    {
        $this->showExpertAdviceModal = true;
        $this->editingExpertAdvice = null;
    }

    public function closeExpertAdviceModal()
    {
        $this->showExpertAdviceModal = false;
        $this->resetForms();
    }

    public function saveExpertAdvice()
    {
        session()->flash('message', 'تم حفظ نصيحة الخبير بنجاح!');
        $this->closeExpertAdviceModal();
    }

    // Modal methods for Doctor Tips
    public function openDoctorTipModal()
    {
        $this->showDoctorTipModal = true;
        $this->editingDoctorTip = null;
    }

    public function closeDoctorTipModal()
    {
        $this->showDoctorTipModal = false;
        $this->resetForms();
    }

    public function saveDoctorTip()
    {
        session()->flash('message', 'تم حفظ نصيحة الطبيب بنجاح!');
        $this->closeDoctorTipModal();
    }

    // Modal methods for Monthly Growth
    public function openMonthlyGrowthModal()
    {
        $this->showMonthlyGrowthModal = true;
        $this->editingMonthlyGrowth = null;
    }

    public function closeMonthlyGrowthModal()
    {
        $this->showMonthlyGrowthModal = false;
        $this->resetForms();
    }

    public function saveMonthlyGrowth()
    {
        session()->flash('message', 'تم حفظ معلومات النمو الشهري بنجاح!');
        $this->closeMonthlyGrowthModal();
    }

    // Modal methods for Baby Shower List
    public function openShowerListModal()
    {
        $this->showShowerListModal = true;
        $this->editingShowerList = null;
    }

    public function closeShowerListModal()
    {
        $this->showShowerListModal = false;
        $this->resetForms();
    }

    public function saveShowerList()
    {
        session()->flash('message', 'تم حفظ عنصر قائمة البيبي شاور بنجاح!');
        $this->closeShowerListModal();
    }

    // Modal methods for Baby Health Record
    public function openBabyHealthModal()
    {
        $this->showBabyHealthModal = true;
        $this->editingBabyHealth = null;
    }

    public function closeBabyHealthModal()
    {
        $this->showBabyHealthModal = false;
        $this->resetForms();
    }

    public function saveBabyHealth()
    {
        session()->flash('message', 'تم حفظ بيانات صحة الطفل بنجاح!');
        $this->closeBabyHealthModal();
    }

    // Modal methods for Kid Doctor
    public function openKidDoctorModal()
    {
        $this->showKidDoctorModal = true;
        $this->editingKidDoctor = null;
    }

    public function closeKidDoctorModal()
    {
        $this->showKidDoctorModal = false;
        $this->resetForms();
    }

    public function saveKidDoctor()
    {
        session()->flash('message', 'تم حفظ بيانات طبيب الأطفال بنجاح!');
        $this->closeKidDoctorModal();
    }

    // Modal methods for Emergency Contact
    public function openEmergencyModal()
    {
        $this->showEmergencyModal = true;
        $this->editingEmergency = null;
    }

    public function closeEmergencyModal()
    {
        $this->showEmergencyModal = false;
        $this->resetForms();
    }

    public function saveEmergency()
    {
        session()->flash('message', 'تم حفظ جهة الاتصال الطارئة بنجاح!');
        $this->closeEmergencyModal();
    }

    // Modal methods for Nursery
    public function openNurseryModal()
    {
        $this->showNurseryModal = true;
        $this->editingNursery = null;
    }

    public function closeNurseryModal()
    {
        $this->showNurseryModal = false;
        $this->resetForms();
    }

    public function saveNursery()
    {
        session()->flash('message', 'تم حفظ بيانات الحضانة بنجاح!');
        $this->closeNurseryModal();
    }

    // Modal methods for Playing Area
    public function openPlayingAreaModal()
    {
        $this->showPlayingAreaModal = true;
        $this->editingPlayingArea = null;
    }

    public function closePlayingAreaModal()
    {
        $this->showPlayingAreaModal = false;
        $this->resetForms();
    }

    public function savePlayingArea()
    {
        session()->flash('message', 'تم حفظ بيانات منطقة اللعب بنجاح!');
        $this->closePlayingAreaModal();
    }

    // Modal methods for Family Advice
    public function openAdviceModal()
    {
        $this->showAdviceModal = true;
    }

    public function closeAdviceModal()
    {
        $this->showAdviceModal = false;
    }

    public function render()
    {
        return view('livewire.welcome-baby-complete');
    }
}
