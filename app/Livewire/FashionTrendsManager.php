<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\FashionTrend;
use App\Models\FashionTrendCategory;

class FashionTrendsManager extends Component
{
    public $title, $content, $image, $category_id, $trend_id;
    public $trends;
    public $categories;
    public $editMode = false;

    public function mount() {
        $this->fetchTrends();
        $this->categories = FashionTrendCategory::all();
    }

    public function fetchTrends() {
        $this->trends = FashionTrend::with('category')->get();
    }

    public function store() {
        $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:fashion_trend_categories,id',
        ]);
        FashionTrend::create([
            'العنوان' => $this->title,
            'الوصف' => $this->content,
            'category_id' => $this->category_id,
            'الصورة' => $this->image,
        ]);
        $this->reset(['title', 'content', 'category_id', 'image']);
        $this->fetchTrends();
    }

    public function edit($id) {
        $trend = FashionTrend::findOrFail($id);
        $this->trend_id = $trend->id;
        $this->title = $trend->العنوان;
        $this->content = $trend->الوصف;
        $this->category_id = $trend->category_id;
        $this->image = $trend->الصورة;
        $this->editMode = true;
    }

    public function update() {
        $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:fashion_trend_categories,id',
        ]);
        $trend = FashionTrend::findOrFail($this->trend_id);
        $trend->update([
            'العنوان' => $this->title,
            'الوصف' => $this->content,
            'category_id' => $this->category_id,
            'الصورة' => $this->image,
        ]);
        $this->reset(['title', 'content', 'category_id', 'image', 'trend_id', 'editMode']);
        $this->fetchTrends();
    }

    public function delete($id) {
        FashionTrend::destroy($id);
        $this->fetchTrends();
    }

    public function render() {
        return view('livewire.fashion-trends-manager');
    }
}
