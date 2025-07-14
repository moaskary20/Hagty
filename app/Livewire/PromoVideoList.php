<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PromoVideo;

class PromoVideoList extends Component
{
    public $search = '';
    public $status = '';

    protected $listeners = [
        'promoVideoSaved' => 'render',
    ];

    public function delete($id)
    {
        PromoVideo::findOrFail($id)->delete();
        session()->flash('message', 'تم حذف الفيديو بنجاح');
    }

    public function render()
    {
        $query = PromoVideo::query();
        if ($this->search) {
            $query->where('title', 'like', "%{$this->search}%");
        }
        if ($this->status) {
            $query->where('status', $this->status);
        }
        $videos = $query->orderByDesc('created_at')->get();
        return view('livewire.promo-video-list', compact('videos'));
    }
}
