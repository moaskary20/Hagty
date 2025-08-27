<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class WeddingGiftSuppliersPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-gift';
    protected static ?string $navigationLabel = 'موردو هدايا الزفاف التذكارية';
    protected static ?string $navigationGroup = 'فرحي';
    protected static ?string $title = 'موردو هدايا الزفاف التذكارية';
    protected static string $view = 'filament.pages.wedding-gift-suppliers';

    public function getViewData(): array
    {
        $query = \App\Models\WeddingGiftSupplier::query()->with(['productGalleries', 'ideas']);
        
        if (request()->filled('search')) {
            $search = request('search');
            $query->where('name', 'like', "%$search%")
                  ->orWhere('specialty', 'like', "%$search%")
                  ->orWhere('address', 'like', "%$search%");
        }
        
        $giftSuppliers = $query->where('is_active', true)->orderBy('name')->get();
        $galleries = \App\Models\GiftProductGallery::where('is_active', true)->with('giftSupplier')->get();
        $ideas = \App\Models\GiftSupplierIdea::where('is_active', true)->with('giftSupplier')->get();
        
        return compact('giftSuppliers', 'galleries', 'ideas');
    }
}
