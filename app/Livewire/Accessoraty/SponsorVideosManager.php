<?php

namespace App\Livewire\Accessoraty;

use Livewire\Component;

class SponsorVideosManager extends Component
{
    public $editId = null;
    public $video_url;
    public $skip_after_seconds;
    public $videos = [];

    public function render()
    {
        // جلب الفيديوهات من قاعدة البيانات إذا كان هناك Model
        // $this->videos = AccessoratySponsorVideo::all();
        return view('livewire.accessoraty.sponsor-videos-manager', [
            'videos' => $this->videos,
            'editId' => $this->editId,
        ]);
    }
}
