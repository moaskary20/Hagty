<?php

namespace App\Http\Livewire\Accessoraty;

use Livewire\Component;
use App\Models\AccessoratyShop;

class ShopsManager extends Component
{
    public $brand_name;
    public $location;
    public $shop_url;
    public $category;
    public $editId = null;
    public $showForm = false;
    public $showBannerForm = false;
    public $showVideoForm = false;
    public $banner_image;
    public $banner_link;
    public $video_url;
    public $skip_after_seconds;

    protected $rules = [
        'brand_name' => 'required|string',
        'location' => 'required|url',
        'shop_url' => 'nullable|url',
        'category' => 'required|string',
        'banner_image' => 'nullable|image|max:2048',
        'banner_link' => 'nullable|url',
        'video_url' => 'nullable|url',
        'skip_after_seconds' => 'nullable|integer|min:1|max:60',
    ];

    public function save()
    {
        $this->validate();
        if ($this->editId) {
            $shop = AccessoratyShop::find($this->editId);
            $shop->update([
                'brand_name' => $this->brand_name,
                'location' => $this->location,
                'shop_url' => $this->shop_url,
                'category' => $this->category,
            ]);
        } else {
            AccessoratyShop::create([
                'brand_name' => $this->brand_name,
                'location' => $this->location,
                'shop_url' => $this->shop_url,
                'category' => $this->category,
            ]);
        }
        $this->reset(['brand_name', 'location', 'shop_url', 'category', 'editId']);
        $this->showForm = false;
    }

    public function edit($id)
    {
        $shop = AccessoratyShop::find($id);
        $this->editId = $shop->id;
        $this->brand_name = $shop->brand_name;
        $this->location = $shop->location;
        $this->shop_url = $shop->shop_url;
        $this->category = $shop->category;
        $this->showForm = true;
    }

    public function delete($id)
    {
        AccessoratyShop::find($id)?->delete();
    }

    public function saveBanner()
    {
        $this->validate([
            'banner_image' => 'required|image|max:2048',
            'banner_link' => 'nullable|url',
        ]);
        $path = $this->banner_image->store('banners', 'public');
        \App\Models\AccessoratyBannerAd::create([
            'image' => $path,
            'link' => $this->banner_link,
        ]);
        $this->reset(['banner_image', 'banner_link', 'showBannerForm']);
    }

    public function saveVideo()
    {
        $this->validate([
            'video_url' => 'required|url',
            'skip_after_seconds' => 'required|integer|min:1|max:60',
        ]);
        \App\Models\AccessoratySponsorVideo::create([
            'video_url' => $this->video_url,
            'skip_after_seconds' => $this->skip_after_seconds,
        ]);
        $this->reset(['video_url', 'skip_after_seconds', 'showVideoForm']);
    }

    public function deleteBanner($id)
    {
        $banner = \App\Models\AccessoratyBannerAd::find($id);
        if ($banner) {
            \Storage::disk('public')->delete($banner->image);
            $banner->delete();
        }
    }

    public function deleteVideo($id)
    {
        $video = \App\Models\AccessoratySponsorVideo::find($id);
        if ($video) {
            $video->delete();
        }
    }

    protected $listeners = [
        'deleteBanner',
        'deleteVideo',
    ];

    public function render()
    {
        $shops = AccessoratyShop::query();
        if (request('category')) {
            $shops->where('category', request('category'));
        }
        return view('livewire.accessoraty.shops-manager', [
            'shops' => $shops->get(),
        ]);
    }
}
