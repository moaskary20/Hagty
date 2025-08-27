<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\BabyDayStep;
use App\Models\BabyHealthInfo;
use App\Models\BabyExpertAdvice;
use App\Models\BabyDoctorTip;
use App\Models\BabyMonthlyGrowth;
use App\Models\BabyShowerList;
use App\Models\Baby;

class WelcomeBaby extends Component
{
    // خصائص المودالات
    public $showDayStepModal = false;
    public $showHealthInfoModal = false;
    public $showExpertAdviceModal = false;
    public $showDoctorTipModal = false;
    public $showMonthlyGrowthModal = false;
    public $showShowerListModal = false;
    public $showBabyModal = false;
    public $showDoctorModal = false;
    public $showNurseryModal = false;
    public $showVaccineModal = false;

    // خصائص التحرير
    public $editingDayStep = null;
    public $editingHealthInfo = null;
    public $editingExpertAdvice = null;
    public $editingDoctorTip = null;
    public $editingMonthlyGrowth = null;
    public $editingShowerList = null;
    public $editingBaby = null;
    public $editingDoctor = false;
    public $editingNursery = false;
    public $editingVaccine = false;

    // نماذج البيانات
    public $dayStepForm = [
        'title' => '',
        'description' => '',
        'step_number' => 1,
        'age_group' => '',
        'category' => '',
        'difficulty_level' => 'متوسط',
    ];

    public $healthInfoForm = [
        'title' => '',
        'content' => '',
        'category' => '',
        'age_range' => '',
    ];

    public $expertAdviceForm = [
        'title' => '',
        'content' => '',
        'expert_name' => '',
        'expert_specialty' => '',
        'advice_category' => '',
    ];

    public $doctorTipForm = [
        'title' => '',
        'content' => '',
        'urgency_level' => 'متوسط',
        'symptoms' => '',
        'age_group' => '',
    ];

    public $monthlyGrowthForm = [
        'month_number' => 1,
        'title' => '',
        'description' => '',
        'physical_development' => '',
        'cognitive_development' => '',
        'milestones' => '',
        'care_tips' => '',
    ];

    public $showerListForm = [
        'item_name' => '',
        'description' => '',
        'category' => '',
        'priority' => 'متوسط',
        'estimated_price' => 0,
        'notes' => '',
        'is_purchased' => false,
    ];

    // نموذج بيانات الطفل
    public $babyForm = [
        'name' => '',
        'birth_date' => '',
        'gender' => '',
        'mother_name' => '',
        'father_name' => '',
        'health_info' => '',
    ];

    public $doctorForm = [
        'name' => '',
        'specialty' => '',
        'phone' => '',
        'notes' => '',
    ];

    public $nurseryForm = [
        'name' => '',
        'address' => '',
        'phone' => '',
        'notes' => '',
    ];

    public $vaccineForm = [
        'name' => '',
        'date' => '',
        'notes' => '',
    ];

    public function mount()
    {
        $this->resetForms();
    }

    // طرق المودالات
    public function openDayStepModal()
    {
        \Log::info('تم استدعاء openDayStepModal');
        $this->resetDayStepForm();
        $this->showDayStepModal = true;
    }

    public function closeDayStepModal()
    {
        $this->showDayStepModal = false;
        $this->editingDayStep = null;
    }

    public function openHealthInfoModal()
    {
        \Log::info('تم استدعاء openHealthInfoModal');
        $this->resetHealthInfoForm();
        $this->showHealthInfoModal = true;
    }

    public function closeHealthInfoModal()
    {
        $this->showHealthInfoModal = false;
        $this->editingHealthInfo = null;
    }

    public function openExpertAdviceModal()
    {
        \Log::info('تم استدعاء openExpertAdviceModal');
        $this->resetExpertAdviceForm();
        $this->showExpertAdviceModal = true;
    }

    public function closeExpertAdviceModal()
    {
        $this->showExpertAdviceModal = false;
        $this->editingExpertAdvice = null;
    }

    public function openDoctorTipModal()
    {
        $this->resetDoctorTipForm();
        $this->showDoctorTipModal = true;
    }

    public function closeDoctorTipModal()
    {
        $this->showDoctorTipModal = false;
        $this->editingDoctorTip = null;
    }

    public function openMonthlyGrowthModal()
    {
        $this->resetMonthlyGrowthForm();
        $this->showMonthlyGrowthModal = true;
    }

    public function closeMonthlyGrowthModal()
    {
        $this->showMonthlyGrowthModal = false;
        $this->editingMonthlyGrowth = null;
    }

    public function openShowerListModal()
    {
        $this->resetShowerListForm();
        $this->showShowerListModal = true;
    }

    public function closeShowerListModal()
    {
        $this->showShowerListModal = false;
        $this->editingShowerList = null;
    }

    public function openBabyModal($babyId = null)
    {
        if ($babyId) {
            $baby = Baby::find($babyId);
            if ($baby) {
                $this->babyForm = $baby->toArray();
                $this->editingBaby = $babyId;
            }
        } else {
            $this->babyForm = [
                'name' => '',
                'birth_date' => '',
                'gender' => '',
                'mother_name' => '',
                'father_name' => '',
                'health_info' => '',
            ];
            $this->editingBaby = false;
        }
        $this->showBabyModal = true;
    }

    public function closeBabyModal()
    {
        $this->showBabyModal = false;
        $this->editingBaby = false;
    }

    public function openDoctorModal($doctorId = null)
    {
        if ($doctorId) {
            $doctor = \App\Models\BabyDoctor::find($doctorId);
            if ($doctor) {
                $this->doctorForm = $doctor->toArray();
                $this->editingDoctor = $doctorId;
            }
        } else {
            $this->doctorForm = [
                'name' => '',
                'specialty' => '',
                'phone' => '',
                'notes' => '',
            ];
            $this->editingDoctor = false;
        }
        $this->showDoctorModal = true;
    }

    public function closeDoctorModal()
    {
        $this->showDoctorModal = false;
        $this->editingDoctor = false;
    }

    public function openNurseryModal($nurseryId = null)
    {
        if ($nurseryId) {
            $nursery = \App\Models\Nursery::find($nurseryId);
            if ($nursery) {
                $this->nurseryForm = $nursery->toArray();
                $this->editingNursery = $nurseryId;
            }
        } else {
            $this->nurseryForm = [
                'name' => '',
                'address' => '',
                'phone' => '',
                'notes' => '',
            ];
            $this->editingNursery = false;
        }
        $this->showNurseryModal = true;
    }

    public function closeNurseryModal()
    {
        $this->showNurseryModal = false;
        $this->editingNursery = false;
    }

    public function openVaccineModal($vaccineId = null)
    {
        if ($vaccineId) {
            $vaccine = \App\Models\Vaccine::find($vaccineId);
            if ($vaccine) {
                $this->vaccineForm = $vaccine->toArray();
                $this->editingVaccine = $vaccineId;
            }
        } else {
            $this->vaccineForm = [
                'name' => '',
                'date' => '',
                'notes' => '',
            ];
            $this->editingVaccine = false;
        }
        $this->showVaccineModal = true;
    }

    public function closeVaccineModal()
    {
        $this->showVaccineModal = false;
        $this->editingVaccine = false;
    }

    // طرق حفظ البيانات
    public function saveDayStep()
    {
        $this->validate([
            'dayStepForm.title' => 'required|string|max:255',
            'dayStepForm.description' => 'required|string',
            'dayStepForm.step_number' => 'required|integer|min:1',
            'dayStepForm.age_group' => 'required|string|max:100',
            'dayStepForm.category' => 'required|string|max:100',
        ]);

        session()->flash('message', 'تم حفظ الخطوة بنجاح!');
        $this->closeDayStepModal();
    }

    public function saveHealthInfo()
    {
        $this->validate([
            'healthInfoForm.title' => 'required|string|max:255',
            'healthInfoForm.content' => 'required|string',
            'healthInfoForm.category' => 'required|string|max:100',
            'healthInfoForm.age_range' => 'required|string|max:100',
        ]);

        session()->flash('message', 'تم حفظ المعلومة الصحية بنجاح!');
        $this->closeHealthInfoModal();
    }

    public function saveExpertAdvice()
    {
        $this->validate([
            'expertAdviceForm.title' => 'required|string|max:255',
            'expertAdviceForm.content' => 'required|string',
            'expertAdviceForm.expert_name' => 'required|string|max:255',
            'expertAdviceForm.expert_specialty' => 'required|string|max:255',
            'expertAdviceForm.advice_category' => 'required|string|max:100',
        ]);

        session()->flash('message', 'تم حفظ نصيحة الخبير بنجاح!');
        $this->closeExpertAdviceModal();
    }

    public function saveDoctorTip()
    {
        $this->validate([
            'doctorTipForm.title' => 'required|string|max:255',
            'doctorTipForm.content' => 'required|string',
            'doctorTipForm.urgency_level' => 'required|string',
            'doctorTipForm.age_group' => 'required|string|max:100',
        ]);

        session()->flash('message', 'تم حفظ نصيحة الطبيب بنجاح!');
        $this->closeDoctorTipModal();
    }

    public function saveMonthlyGrowth()
    {
        $this->validate([
            'monthlyGrowthForm.month_number' => 'required|integer|min:1|max:36',
            'monthlyGrowthForm.title' => 'required|string|max:255',
            'monthlyGrowthForm.description' => 'required|string',
            'monthlyGrowthForm.physical_development' => 'required|string',
            'monthlyGrowthForm.cognitive_development' => 'required|string',
        ]);

        session()->flash('message', 'تم حفظ معلومات النمو الشهري بنجاح!');
        $this->closeMonthlyGrowthModal();
    }

    public function saveShowerList()
    {
        $this->validate([
            'showerListForm.item_name' => 'required|string|max:255',
            'showerListForm.description' => 'required|string',
            'showerListForm.category' => 'required|string|max:100',
            'showerListForm.priority' => 'required|string',
            'showerListForm.estimated_price' => 'required|numeric|min:0',
        ]);

        session()->flash('message', 'تم حفظ عنصر قائمة الحفلة بنجاح!');
        $this->closeShowerListModal();
    }

    public function saveBaby()
    {
        $this->validate([
            'babyForm.name' => 'required',
            'babyForm.birth_date' => 'required|date',
            'babyForm.gender' => 'required',
            'babyForm.mother_name' => 'required',
            'babyForm.father_name' => 'required',
        ], [], [
            'babyForm.name' => 'اسم الطفل',
            'babyForm.birth_date' => 'تاريخ الميلاد',
            'babyForm.gender' => 'الجنس',
            'babyForm.mother_name' => 'اسم الأم',
            'babyForm.father_name' => 'اسم الأب',
        ]);

        if ($this->editingBaby) {
            $baby = Baby::find($this->editingBaby);
            if ($baby) {
                $baby->update($this->babyForm);
            }
        } else {
            Baby::create($this->babyForm);
        }
        $this->closeBabyModal();
    }

    public function saveDoctor()
    {
        $this->validate([
            'doctorForm.name' => 'required',
            'doctorForm.specialty' => 'required',
        ], [], [
            'doctorForm.name' => 'اسم الطبيب',
            'doctorForm.specialty' => 'التخصص',
        ]);

        if ($this->editingDoctor) {
            $doctor = \App\Models\BabyDoctor::find($this->editingDoctor);
            if ($doctor) {
                $doctor->update($this->doctorForm);
            }
        } else {
            \App\Models\BabyDoctor::create($this->doctorForm);
        }
        $this->closeDoctorModal();
    }

    public function saveNursery()
    {
        $this->validate([
            'nurseryForm.name' => 'required',
            'nurseryForm.address' => 'required',
        ], [], [
            'nurseryForm.name' => 'اسم الحضانة',
            'nurseryForm.address' => 'العنوان',
        ]);

        if ($this->editingNursery) {
            $nursery = \App\Models\Nursery::find($this->editingNursery);
            if ($nursery) {
                $nursery->update($this->nurseryForm);
            }
        } else {
            \App\Models\Nursery::create($this->nurseryForm);
        }
        $this->closeNurseryModal();
    }

    public function saveVaccine()
    {
        $this->validate([
            'vaccineForm.name' => 'required',
            'vaccineForm.date' => 'required|date',
        ], [], [
            'vaccineForm.name' => 'اسم التطعيم',
            'vaccineForm.date' => 'تاريخ التطعيم',
        ]);

        if ($this->editingVaccine) {
            $vaccine = \App\Models\Vaccine::find($this->editingVaccine);
            if ($vaccine) {
                $vaccine->update($this->vaccineForm);
            }
        } else {
            \App\Models\Vaccine::create($this->vaccineForm);
        }
        $this->closeVaccineModal();
    }

    public function deleteBaby($babyId)
    {
        $baby = Baby::find($babyId);
        if ($baby) {
            $baby->delete();
        }
    }

    public function deleteDoctor($doctorId)
    {
        $doctor = \App\Models\BabyDoctor::find($doctorId);
        if ($doctor) {
            $doctor->delete();
        }
    }

    public function deleteNursery($nurseryId)
    {
        $nursery = \App\Models\Nursery::find($nurseryId);
        if ($nursery) {
            $nursery->delete();
        }
    }

    public function deleteVaccine($vaccineId)
    {
        $vaccine = \App\Models\Vaccine::find($vaccineId);
        if ($vaccine) {
            $vaccine->delete();
        }
    }

    // طرق إعادة تعيين النماذج
    public function resetForms()
    {
        $this->resetDayStepForm();
        $this->resetHealthInfoForm();
        $this->resetExpertAdviceForm();
        $this->resetDoctorTipForm();
        $this->resetMonthlyGrowthForm();
        $this->resetShowerListForm();
        $this->resetBabyForm();
        $this->resetDoctorForm();
        $this->resetNurseryForm();
        $this->resetVaccineForm();
    }

    public function resetDayStepForm()
    {
        $this->dayStepForm = [
            'title' => '',
            'description' => '',
            'step_number' => 1,
            'age_group' => '',
            'category' => '',
            'difficulty_level' => 'متوسط',
        ];
    }

    public function resetHealthInfoForm()
    {
        $this->healthInfoForm = [
            'title' => '',
            'content' => '',
            'category' => '',
            'age_range' => '',
        ];
    }

    public function resetExpertAdviceForm()
    {
        $this->expertAdviceForm = [
            'title' => '',
            'content' => '',
            'expert_name' => '',
            'expert_specialty' => '',
            'advice_category' => '',
        ];
    }

    public function resetDoctorTipForm()
    {
        $this->doctorTipForm = [
            'title' => '',
            'content' => '',
            'urgency_level' => 'متوسط',
            'symptoms' => '',
            'age_group' => '',
        ];
    }

    public function resetMonthlyGrowthForm()
    {
        $this->monthlyGrowthForm = [
            'month_number' => 1,
            'title' => '',
            'description' => '',
            'physical_development' => '',
            'cognitive_development' => '',
            'milestones' => '',
            'care_tips' => '',
        ];
    }

    public function resetShowerListForm()
    {
        $this->showerListForm = [
            'item_name' => '',
            'description' => '',
            'category' => '',
            'priority' => 'متوسط',
            'estimated_price' => 0,
            'notes' => '',
            'is_purchased' => false,
        ];
    }

    public function resetBabyForm()
    {
        $this->babyForm = [
            'name' => '',
            'birth_date' => '',
            'gender' => '',
            'mother_name' => '',
            'father_name' => '',
            'health_info' => '',
        ];
        $this->editingBaby = null;
    }

    public function resetDoctorForm()
    {
        $this->doctorForm = [
            'name' => '',
            'specialty' => '',
            'phone' => '',
            'notes' => '',
        ];
        $this->editingDoctor = false;
    }

    public function resetNurseryForm()
    {
        $this->nurseryForm = [
            'name' => '',
            'address' => '',
            'phone' => '',
            'notes' => '',
        ];
        $this->editingNursery = false;
    }

    public function resetVaccineForm()
    {
        $this->vaccineForm = [
            'name' => '',
            'date' => '',
            'notes' => '',
        ];
        $this->editingVaccine = false;
    }

    // خصائص computed للبيانات
    public function getBabyDayStepsProperty()
    {
        return collect([
            (object)[
                'id' => 1,
                'title' => 'تغيير الحفاضة',
                'description' => 'تغيير حفاضة الطفل كل 2-3 ساعات أو عند الحاجة. تنظيف المنطقة برفق وتطبيق كريم الحماية.',
                'step_number' => 1,
                'age_group' => '0-24 شهر',
                'category' => 'العناية الشخصية',
                'difficulty_level' => 'سهل'
            ],
            (object)[
                'id' => 2,
                'title' => 'الرضاعة',
                'description' => 'إطعام الطفل كل 2-3 ساعات. للرضاعة الطبيعية، تأكدي من الوضعية الصحيحة.',
                'step_number' => 2,
                'age_group' => '0-6 أشهر',
                'category' => 'التغذية',
                'difficulty_level' => 'متوسط'
            ],
            (object)[
                'id' => 3,
                'title' => 'النوم الآمن',
                'description' => 'ضعي الطفل على ظهره للنوم، في سرير منفصل، بدون وسائد أو بطانيات فضفاضة.',
                'step_number' => 3,
                'age_group' => '0-12 شهر',
                'category' => 'النوم',
                'difficulty_level' => 'سهل'
            ]
        ]);
    }

    public function getBabyHealthInfosProperty()
    {
        return collect([
            (object)[
                'id' => 1,
                'title' => 'أهمية الرضاعة الطبيعية',
                'content' => 'الرضاعة الطبيعية توفر جميع العناصر الغذائية التي يحتاجها طفلك في الأشهر الستة الأولى.',
                'category' => 'التغذية',
                'age_range' => '0-6 أشهر'
            ],
            (object)[
                'id' => 2,
                'title' => 'علامات الجفاف عند الأطفال',
                'content' => 'راقبي علامات الجفاف مثل قلة البلل في الحفاظة، جفاف الفم، البكاء بدون دموع.',
                'category' => 'الصحة العامة',
                'age_range' => '0-12 شهر'
            ]
        ]);
    }

    public function getBabyExpertAdvicesProperty()
    {
        return collect([
            (object)[
                'id' => 1,
                'title' => 'تطوير التواصل مع الطفل',
                'content' => 'التحدث مع طفلك منذ الولادة يساعد في تطوير مهارات اللغة والتواصل.',
                'expert_name' => 'د. سارة أحمد',
                'expert_specialty' => 'أخصائية تطوير الطفل',
                'advice_category' => 'التطوير المعرفي'
            ]
        ]);
    }

    public function getBabyDoctorTipsProperty()
    {
        return collect([
            (object)[
                'id' => 1,
                'title' => 'علامات الحمى عند الرضع',
                'content' => 'درجة حرارة أعلى من 38°م تتطلب استشارة طبية فورية للأطفال دون 3 أشهر.',
                'urgency_level' => 'عالي',
                'symptoms' => 'حمى، خمول، قلة الرضاعة',
                'age_group' => '0-3 أشهر'
            ]
        ]);
    }

    public function getBabyMonthlyGrowthsProperty()
    {
        return collect([
            (object)[
                'id' => 1,
                'month_number' => 1,
                'title' => 'الشهر الأول',
                'description' => 'في هذا الشهر، يتكيف طفلك مع الحياة خارج الرحم.',
                'physical_development' => 'النوم 14-18 ساعة يومياً، البدء في رفع الرأس قليلاً',
                'cognitive_development' => 'الاستجابة للأصوات العالية، التعرف على رائحة الأم',
                'milestones' => 'التحديق في الوجوه، الاستجابة للأصوات',
                'care_tips' => 'الرضاعة المتكررة، النوم الآمن، التدليك اللطيف'
            ]
        ]);
    }

    public function getBabyShowerListsProperty()
    {
        return collect([
            (object)[
                'id' => 1,
                'item_name' => 'سرير أطفال',
                'description' => 'سرير آمن ومريح للطفل مع مرتبة طبية',
                'category' => 'أثاث',
                'priority' => 'عالي',
                'estimated_price' => 800,
                'notes' => 'يفضل الخشب الطبيعي',
                'is_purchased' => false
            ]
        ]);
    }

    public function getBabiesProperty()
    {
        return \App\Models\Baby::orderBy('created_at', 'desc')->get();
    }

    public function getDoctorsProperty()
    {
        return \App\Models\BabyDoctor::orderByDesc('id')->get();
    }

    public function getNurseriesProperty()
    {
        return \App\Models\Nursery::orderByDesc('id')->get();
    }

    public function getVaccinesProperty()
    {
        return \App\Models\Vaccine::orderByDesc('id')->get();
    }

    public function render()
    {
        return view('livewire.welcome-baby');
    }
}
