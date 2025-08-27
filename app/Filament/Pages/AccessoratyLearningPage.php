<?php
namespace App\Filament\Pages;
use Filament\Pages\Page;
class AccessoratyLearningPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationLabel = 'يمكنك تحقيق ذلك';
    protected static ?string $navigationGroup = 'اكسسوراتى';
    protected static ?string $title = 'نظام تعليمى لإدارة الكورسات والفيديوهات التدريبية';
    protected static string $view = 'filament.pages.accessoraty-learning';
}
