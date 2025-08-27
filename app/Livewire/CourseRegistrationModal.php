<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Support\Facades\Validator;

class CourseRegistrationModal extends Component
{
    public $showModal = false;
    public $courseId;
    public $courseName;
    
    // Form fields
    public $first_name = '';
    public $last_name = '';
    public $email = '';
    public $phone = '';
    public $age = '';
    public $city = '';
    public $education_level = '';
    public $experience_level = '';
    public $goals = '';
    
    protected $rules = [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'age' => 'required|integer|min:16|max:100',
        'city' => 'required|string|max:255',
        'education_level' => 'required|string|max:255',
        'experience_level' => 'required|string|max:255',
        'goals' => 'required|string|max:1000',
    ];
    
    protected $messages = [
        'first_name.required' => 'الاسم الأول مطلوب',
        'last_name.required' => 'الاسم الأخير مطلوب',
        'email.required' => 'البريد الإلكتروني مطلوب',
        'email.email' => 'البريد الإلكتروني غير صحيح',
        'phone.required' => 'رقم الهاتف مطلوب',
        'age.required' => 'العمر مطلوب',
        'age.integer' => 'العمر يجب أن يكون رقماً',
        'age.min' => 'العمر يجب أن يكون 16 سنة على الأقل',
        'age.max' => 'العمر يجب أن يكون أقل من 100 سنة',
        'city.required' => 'المدينة مطلوبة',
        'education_level.required' => 'المستوى التعليمي مطلوب',
        'experience_level.required' => 'مستوى الخبرة مطلوب',
        'goals.required' => 'الأهداف مطلوبة',
    ];

    protected $listeners = ['openCourseRegistration' => 'openModal'];

    public function openModal($courseId, $courseName)
    {
        $this->courseId = $courseId;
        $this->courseName = $courseName;
        $this->showModal = true;
        
        // Debug information
        \Log::info('Course registration modal opened', [
            'courseId' => $this->courseId,
            'courseName' => $this->courseName
        ]);
        
        // Force re-render
        $this->dispatch('modal-opened');
        
        // Log to browser console
        $this->dispatch('console-log', message: "Modal opened for course: {$this->courseName} (ID: {$this->courseId})");
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->phone = '';
        $this->age = '';
        $this->city = '';
        $this->education_level = '';
        $this->experience_level = '';
        $this->goals = '';
        $this->resetValidation();
    }

    public function register()
    {
        $this->validate();

        try {
            // Create new student
            $student = Student::create([
                'name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
                'phone' => $this->phone,
                'age' => $this->age,
                'city' => $this->city,
                'education_level' => $this->education_level,
                'experience_level' => $this->experience_level,
                'goals' => $this->goals,
                'course_id' => $this->courseId,
                'registration_date' => now(),
                'status' => 'active',
            ]);

            // Close modal and show success message
            $this->closeModal();
            session()->flash('success', 'تم التسجيل في الكورس بنجاح! سنتواصل معك قريباً.');
            
        } catch (\Exception $e) {
            session()->flash('error', 'حدث خطأ أثناء التسجيل. يرجى المحاولة مرة أخرى.');
        }
    }

    public function render()
    {
        return view('livewire.course-registration-modal');
    }
}
