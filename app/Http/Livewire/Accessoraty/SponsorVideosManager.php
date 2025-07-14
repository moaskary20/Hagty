<?php

namespace App\Http\Livewire\Accessoraty;

use Livewire\Component;
use App\Models\AccessoratySponsorVideo;

class SponsorVideosManager extends Component
{
    public $video_url;
    public $skip_after_seconds = 6;
    public $editId = null;

    protected $rules = [
        'video_url' => 'required|string',
        'skip_after_seconds' => 'required|integer|min:1',
    ];

    public function save()
    {
        $this->validate();
        if ($this->editId) {
            $video = AccessoratySponsorVideo::find($this->editId);
            $video->update([
                'video_url' => $this->video_url,
                'skip_after_seconds' => $this->skip_after_seconds,
            ]);
        } else {
            AccessoratySponsorVideo::create([
                'video_url' => $this->video_url,
                'skip_after_seconds' => $this->skip_after_seconds,
            ]);
        }
        $this->reset(['video_url', 'skip_after_seconds', 'editId']);
    }

    public function edit($id)
    {
        $video = AccessoratySponsorVideo::find($id);
        $this->editId = $video->id;
        $this->video_url = $video->video_url;
        $this->skip_after_seconds = $video->skip_after_seconds;
    }

    public function delete($id)
    {
        AccessoratySponsorVideo::find($id)?->delete();
    }

    public function render()
    {
        return view('livewire.accessoraty.sponsor-videos-manager', [
            'videos' => AccessoratySponsorVideo::all(),
        ]);
    }
}
