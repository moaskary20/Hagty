<?php

namespace App\Livewire\Accessoraty;

use Livewire\Component;

class ShopsManager extends Component
{
    public $showForm = false;
    public $showBannerForm = false;
    public $showVideoForm = false;
    public $editId = null;
    public $brand_name;
    public $location;
    public $shop_url;
    public $category;
    public $shops = [];

    public function render()
    {
        // جلب المتاجر من قاعدة البيانات إذا كان هناك Model
        // $this->shops = AccessoratyShop::all();
        return view('livewire.accessoraty.shops-manager', [
            'showForm' => $this->showForm,
            'showBannerForm' => $this->showBannerForm,
            'showVideoForm' => $this->showVideoForm,
            'editId' => $this->editId,
            'brand_name' => $this->brand_name,
            'location' => $this->location,
            'shop_url' => $this->shop_url,
            'category' => $this->category,
            'shops' => $this->shops,
        ]);
    }
}
