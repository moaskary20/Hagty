<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PromotionVideo;

class PromotionVideoForm extends Component
{
    public $title;
    public $url;
    public $desc;
    public $success = false;

    protected $rules = [
        'title' => 'required|string|max:255',
        'url' => 'required|url',
        'desc' => 'nullable|string',
    ];

    public function save()
    {
        $this->validate();
        PromotionVideo::create([
            'title' => $this->title,
            'url' => $this->url,
            'desc' => $this->desc,
        ]);
        $this->reset(['title', 'url', 'desc']);
        $this->success = true;
    }

    public function render()
    {
        return view('livewire.promotion-video-form');
    }
}
