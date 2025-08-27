<?php

namespace App\Filament\Resources\Sehati;

use App\Filament\Resources\Sehati\HospitalResource\Pages;
use App\Models\Hospital;
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
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Support\Enums\FontWeight;
use Filament\Support\Enums\Alignment;

class HospitalResource extends Resource
{
    protected static ?string $model = Hospital::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';
    
    protected static ?string $navigationLabel = 'دليل المستشفيات';
    
    protected static ?string $modelLabel = 'مستشفى';
    
    protected static ?string $pluralModelLabel = 'المستشفيات';
    
    protected static ?string $navigationGroup = 'صحتي';
    
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('معلومات المستشفى')
                    ->schema([
                        TextInput::make('name')
                            ->label('اسم المستشفى')
                            ->required()
                            ->maxLength(255),
                        
                        TextInput::make('specialty')
                            ->label('التخصص')
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
                            ->label('صورة المستشفى')
                            ->image()
                            ->imageEditor()
                            ->directory('hospitals')
                            ->visibility('public'),
                    ])
                    ->columns(2),
                
                Section::make('أرقام الطوارئ')
                    ->schema([
                        Repeater::make('emergency_numbers')
                            ->label('أرقام الطوارئ')
                            ->schema([
                                TextInput::make('number')
                                    ->label('رقم الطوارئ')
                                    ->tel()
                                    ->required(),
                                TextInput::make('description')
                                    ->label('وصف الرقم')
                                    ->placeholder('مثال: طوارئ عام، طوارئ قلب، إلخ')
                            ])
                            ->columns(2)
                            ->addActionLabel('إضافة رقم طوارئ')
                            ->itemLabel(fn (array $state): ?string => $state['number'] ?? null)
                            ->collapsible()
                            ->defaultItems(1),
                    ]),
                
                Section::make('الروابط')
                    ->schema([
                        TextInput::make('google_maps_link')
                            ->label('رابط Google Maps')
                            ->url()
                            ->placeholder('https://maps.google.com/...'),
                        
                        TextInput::make('booking_link')
                            ->label('رابط الحجز')
                            ->url()
                            ->placeholder('https://booking.example.com/...'),
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
                    ->view('filament.tables.columns.hospital-image')
                    ->width('80px')
                    ->alignCenter(),
                
                TextColumn::make('name')
                    ->label('اسم المستشفى')
                    ->searchable()
                    ->sortable()
                    ->weight(FontWeight::Bold),
                
                TextColumn::make('specialty')
                    ->label('التخصص')
                    ->searchable()
                    ->badge()
                    ->color('info'),
                
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
                
                ViewColumn::make('emergency_numbers')
                    ->label('أرقام الطوارئ')
                    ->view('filament.tables.columns.hospital-emergency'),
                
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
                
                TextColumn::make('booking_link')
                    ->label('الحجز')
                    ->url(fn ($record) => $record->booking_link)
                    ->openUrlInNewTab()
                    ->icon('heroicon-o-calendar')
                    ->limit(0)
                    ->formatStateUsing(fn ($state) => $state ? 'احجز الآن' : 'غير متوفر')
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
            'index' => Pages\ListHospitals::route('/'),
            'create' => Pages\CreateHospital::route('/create'),
            'edit' => Pages\EditHospital::route('/{record}/edit'),
        ];
    }
}
