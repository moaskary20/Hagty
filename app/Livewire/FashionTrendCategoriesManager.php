<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\FashionTrendCategory;

class FashionTrendCategoriesManager extends Component
{
    public $name, $description, $category_id;
    public $categories;
    public $editMode = false;

    public function mount() {
        $this->fetchCategories();
    }

    public function fetchCategories() {
        $this->categories = FashionTrendCategory::all();
    }

    public function store() {
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        FashionTrendCategory::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);
        $this->reset(['name', 'description']);
        $this->fetchCategories();
    }

    public function edit($id) {
        $cat = FashionTrendCategory::findOrFail($id);
        $this->category_id = $cat->id;
        $this->name = $cat->name;
        $this->description = $cat->description;
        $this->editMode = true;
    }

    public function update() {
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $cat = FashionTrendCategory::findOrFail($this->category_id);
        $cat->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);
        $this->reset(['name', 'description', 'category_id', 'editMode']);
        $this->fetchCategories();
    }

    public function delete($id) {
        FashionTrendCategory::destroy($id);
        $this->fetchCategories();
    }

    public function render() {
        return view('livewire.fashion-trend-categories-manager');
    }
}
