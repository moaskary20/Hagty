<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PromoVideo;

class PromoVideoForm extends Component
{
    public $promoVideoId;
    public $title;
    public $description;
    public $video_url;
    public $status = 'active';

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'video_url' => 'required|url',
        'status' => 'required|in:active,inactive',
    ];

    protected $listeners = [
        'editPromoVideo' => 'loadPromoVideo',
        'resetPromoVideoForm' => 'resetForm',
    ];

    public function save()
    {
        $this->validate();
        PromoVideo::updateOrCreate(
            ['id' => $this->promoVideoId],
            [
                'title' => $this->title,
                'description' => $this->description,
                'video_url' => $this->video_url,
                'status' => $this->status,
            ]
        );
        $this->dispatch('promoVideoSaved');
        $this->resetForm();
        session()->flash('message', $this->promoVideoId ? 'تم تحديث الفيديو بنجاح' : 'تم إضافة الفيديو بنجاح');
    }

    public function loadPromoVideo($id)
    {
        $promoVideo = PromoVideo::findOrFail($id);
        $this->promoVideoId = $promoVideo->id;
        $this->title = $promoVideo->title;
        $this->description = $promoVideo->description;
        $this->video_url = $promoVideo->video_url;
        $this->status = $promoVideo->status;
    }

    public function resetForm()
    {
        $this->promoVideoId = null;
        $this->title = '';
        $this->description = '';
        $this->video_url = '';
        $this->status = 'active';
    }

    public function render()
    {
        return view('livewire.promo-video-form');
    }
}
