<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\BeTheChef;

class BeTheChefForm extends Component
{
    use WithFileUploads;

    public $chefId;
    public $title;
    public $type = 'video';
    public $description;
    public $video_url;
    public $image;
    public $is_online = false;
    public $tips = [];
    public $status = 'active';

    protected $rules = [
        'title' => 'required|string|max:255',
        'type' => 'required|in:course,video',
        'description' => 'nullable|string',
        'video_url' => 'nullable|url',
        'image' => 'nullable|image|max:2048',
        'is_online' => 'boolean',
        'tips' => 'nullable|array',
        'status' => 'required|in:active,inactive',
    ];

    protected $listeners = [
        'editBeTheChef' => 'loadChef',
        'resetBeTheChefForm' => 'resetForm',
    ];

    public function save()
    {
        $this->validate();
        $imagePath = $this->image ? $this->image->store('be-the-chef', 'public') : null;
        BeTheChef::updateOrCreate(
            ['id' => $this->chefId],
            [
                'title' => $this->title,
                'type' => $this->type,
                'description' => $this->description,
                'video_url' => $this->video_url,
                'image' => $imagePath,
                'is_online' => $this->is_online,
                'tips' => $this->tips,
                'status' => $this->status,
            ]
        );
        $this->dispatch('beTheChefSaved');
        $this->resetForm();
        session()->flash('message', $this->chefId ? 'تم تحديث الدورة/الفيديو بنجاح' : 'تم إضافة الدورة/الفيديو بنجاح');
    }

    public function loadChef($id)
    {
        $chef = BeTheChef::findOrFail($id);
        $this->chefId = $chef->id;
        $this->title = $chef->title;
        $this->type = $chef->type;
        $this->description = $chef->description;
        $this->video_url = $chef->video_url;
        $this->image = $chef->image;
        $this->is_online = $chef->is_online;
        $this->tips = $chef->tips;
        $this->status = $chef->status;
    }

    public function resetForm()
    {
        $this->chefId = null;
        $this->title = '';
        $this->type = 'video';
        $this->description = '';
        $this->video_url = '';
        $this->image = null;
        $this->is_online = false;
        $this->tips = [];
        $this->status = 'active';
    }

    public function render()
    {
        return view('livewire.be-the-chef-form');
    }
}
