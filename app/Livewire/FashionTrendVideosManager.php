<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\FashionTrendVideo;
use App\Models\FashionTrend;

class FashionTrendVideosManager extends Component
{
    public $trend_id, $title, $video_url, $description, $video_id;
    public $videos;
    public $trends;
    public $editMode = false;

    public function mount() {
        $this->fetchVideos();
        $this->trends = FashionTrend::all();
    }

    public function fetchVideos() {
        $this->videos = FashionTrendVideo::with('trend')->get();
    }

    public function store() {
        $this->validate([
            'trend_id' => 'required|exists:fashion_trends,id',
            'title' => 'required|string|max:255',
            'video_url' => 'required|url',
        ]);
        FashionTrendVideo::create([
            'trend_id' => $this->trend_id,
            'title' => $this->title,
            'video_url' => $this->video_url,
            'description' => $this->description,
        ]);
        $this->reset(['trend_id', 'title', 'video_url', 'description']);
        $this->fetchVideos();
    }

    public function edit($id) {
        $video = FashionTrendVideo::findOrFail($id);
        $this->video_id = $video->id;
        $this->trend_id = $video->trend_id;
        $this->title = $video->title;
        $this->video_url = $video->video_url;
        $this->description = $video->description;
        $this->editMode = true;
    }

    public function update() {
        $this->validate([
            'trend_id' => 'required|exists:fashion_trends,id',
            'title' => 'required|string|max:255',
            'video_url' => 'required|url',
        ]);
        $video = FashionTrendVideo::findOrFail($this->video_id);
        $video->update([
            'trend_id' => $this->trend_id,
            'title' => $this->title,
            'video_url' => $this->video_url,
            'description' => $this->description,
        ]);
        $this->reset(['trend_id', 'title', 'video_url', 'description', 'video_id', 'editMode']);
        $this->fetchVideos();
    }

    public function delete($id) {
        FashionTrendVideo::destroy($id);
        $this->fetchVideos();
    }

    public function render() {
        return view('livewire.fashion-trend-videos-manager');
    }
}
