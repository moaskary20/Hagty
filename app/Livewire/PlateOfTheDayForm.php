<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\PlateOfTheDay;

class PlateOfTheDayForm extends Component
{
    use WithFileUploads;

    public $plateId;
    public $title;
    public $description;
    public $steps = [];
    public $main_image;
    public $gallery = [];
    public $video_url;
    public $status = 'active';

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'steps' => 'required|array|min:1',
        'main_image' => 'nullable|image|max:2048',
        'gallery.*' => 'nullable|image|max:2048',
        'video_url' => 'nullable|url',
        'status' => 'required|in:active,inactive',
    ];

    protected $listeners = [
        'editPlateOfTheDay' => 'loadPlate',
        'resetPlateOfTheDayForm' => 'resetForm',
    ];

    public function save()
    {
        $this->validate();
        $mainImagePath = $this->main_image ? $this->main_image->store('plates', 'public') : null;
        $galleryPaths = [];
        if ($this->gallery) {
            foreach ($this->gallery as $img) {
                $galleryPaths[] = $img->store('plates', 'public');
            }
        }
        PlateOfTheDay::updateOrCreate(
            ['id' => $this->plateId],
            [
                'title' => $this->title,
                'description' => $this->description,
                'steps' => $this->steps,
                'main_image' => $mainImagePath,
                'gallery' => $galleryPaths,
                'video_url' => $this->video_url,
                'status' => $this->status,
            ]
        );
        $this->dispatch('plateOfTheDaySaved');
        $this->resetForm();
        session()->flash('message', $this->plateId ? 'تم تحديث الطبق بنجاح' : 'تم إضافة الطبق بنجاح');
    }

    public function loadPlate($id)
    {
        $plate = PlateOfTheDay::findOrFail($id);
        $this->plateId = $plate->id;
        $this->title = $plate->title;
        $this->description = $plate->description;
        $this->steps = $plate->steps;
        $this->main_image = $plate->main_image;
        $this->gallery = $plate->gallery;
        $this->video_url = $plate->video_url;
        $this->status = $plate->status;
    }

    public function resetForm()
    {
        $this->plateId = null;
        $this->title = '';
        $this->description = '';
        $this->steps = [];
        $this->main_image = null;
        $this->gallery = [];
        $this->video_url = '';
        $this->status = 'active';
    }

    public function render()
    {
        return view('livewire.plate-of-the-day-form');
    }
}
