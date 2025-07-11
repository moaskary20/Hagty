<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessoryShop extends Model
{
    use HasFactory;
    protected $table = 'متاجر_الإكسسوارات';
    protected $fillable = [
        'اسم_العلامة_التجارية',
        'الموقع',
        'رابط_المتجر',
        'فئة_التاجر',
    ];
}
