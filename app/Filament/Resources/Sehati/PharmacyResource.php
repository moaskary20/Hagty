<?php

namespace App\Filament\Resources\Sehati;

use App\Filament\Resources\Sehati\PharmacyResource\Pages;
use App\Models\Pharmacy;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Support\Enums\FontWeight;
use Filament\Support\Enums\Alignment;

class PharmacyResource extends Resource
{
    protected static ?string $model = Pharmacy::class;

    protected static ?string $navigationIcon = 'heroicon-o-beaker';
    
    protected static ?string $navigationLabel = 'دليل الصيدليات';
    
    protected static ?string $modelLabel = 'صيدلية';
    
    protected static ?string $pluralModelLabel = 'الصيدليات';
    
    protected static ?string $navigationGroup = 'صحتي';
    
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('معلومات الصيدلية')
                    ->schema([
                        TextInput::make('name')
                            ->label('اسم الصيدلية')
                            ->required()
                            ->maxLength(255),
                        
                        Textarea::make('address')
                            ->label('العنوان')
                            ->required()
                            ->rows(3),
                        
                        TextInput::make('phone')
                            ->label('رقم الهاتف')
                            ->tel()
                            ->required()
                            ->maxLength(20),
                        
                        FileUpload::make('image')
                            ->label('صورة الصيدلية')
                            ->image()
                            ->imageEditor()
                            ->directory('pharmacies')
                            ->visibility('public'),
                    ])
                    ->columns(2),
                
                Section::make('الروابط')
                    ->schema([
                        TextInput::make('google_maps_link')
                            ->label('رابط Google Maps')
                            ->url()
                            ->placeholder('https://maps.google.com/...'),
                        
                        TextInput::make('online_order_link')
                            ->label('رابط الطلب أونلاين')
                            ->url()
                            ->placeholder('https://order.pharmacy.com/...'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ViewColumn::make('image')
                    ->label('الصورة')
                    ->view('filament.tables.columns.pharmacy-image')
                    ->width('80px')
                    ->alignCenter(),
                
                TextColumn::make('name')
                    ->label('اسم الصيدلية')
                    ->searchable()
                    ->sortable()
                    ->weight(FontWeight::Bold),
                
                TextColumn::make('address')
                    ->label('العنوان')
                    ->limit(50)
                    ->tooltip(function (TextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) <= 50) {
                            return null;
                        }
                        return $state;
                    }),
                
                TextColumn::make('phone')
                    ->label('رقم الهاتف')
                    ->copyable()
                    ->copyMessage('تم نسخ رقم الهاتف!')
                    ->icon('heroicon-o-phone'),
                
                TextColumn::make('google_maps_link')
                    ->label('الموقع')
                    ->url(fn ($record) => $record->google_maps_link)
                    ->openUrlInNewTab()
                    ->icon('heroicon-o-map-pin')
                    ->limit(0)
                    ->formatStateUsing(fn ($state) => $state ? 'عرض الموقع' : 'غير متوفر')
                    ->color('success'),
                
                TextColumn::make('online_order_link')
                    ->label('الطلب أونلاين')
                    ->url(fn ($record) => $record->online_order_link)
                    ->openUrlInNewTab()
                    ->icon('heroicon-o-shopping-cart')
                    ->limit(0)
                    ->formatStateUsing(fn ($state) => $state ? 'اطلب الآن' : 'غير متوفر')
                    ->color('warning'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('تعديل')
                    ->color('info'),
                Tables\Actions\DeleteAction::make()
                    ->label('حذف')
                    ->color('danger'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('حذف المحدد'),
                ]),
            ])
            ->defaultSort('name')
            ->striped()
            ->paginated([10, 25, 50, 100])
            ->poll('30s');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPharmacies::route('/'),
            'create' => Pages\CreatePharmacy::route('/create'),
            'edit' => Pages\EditPharmacy::route('/{record}/edit'),
        ];
    }
}
