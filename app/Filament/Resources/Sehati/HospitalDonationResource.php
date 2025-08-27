<?php

namespace App\Filament\Resources\Sehati;

use App\Filament\Resources\Sehati\HospitalDonationResource\Pages;
use App\Models\HospitalDonation;
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
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Support\Enums\FontWeight;
use Filament\Support\Enums\Alignment;

class HospitalDonationResource extends Resource
{
    protected static ?string $model = HospitalDonation::class;

    protected static ?string $navigationIcon = 'heroicon-o-heart';
    
    protected static ?string $navigationLabel = 'التبرعات للمستشفيات';
    
    protected static ?string $modelLabel = 'تبرع';
    
    protected static ?string $pluralModelLabel = 'التبرعات';
    
    protected static ?string $navigationGroup = 'صحتي';
    
    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('معلومات المستشفى')
                    ->schema([
                        TextInput::make('hospital_name')
                            ->label('اسم المستشفى')
                            ->required()
                            ->maxLength(255),
                        
                        Textarea::make('description')
                            ->label('وصف المستشفى أو سبب التبرع')
                            ->rows(3)
                            ->placeholder('اكتب وصفاً موجزاً عن المستشفى أو سبب الحاجة للتبرع'),
                        
                        FileUpload::make('image')
                            ->label('صورة أو شعار المستشفى')
                            ->image()
                            ->imageEditor()
                            ->directory('hospital-donations')
                            ->visibility('public'),
                        
                        Select::make('status')
                            ->label('حالة التبرع')
                            ->options([
                                'active' => 'نشط',
                                'inactive' => 'غير نشط',
                            ])
                            ->required()
                            ->default('active'),
                    ])
                    ->columns(2),
                
                Section::make('معلومات التبرع')
                    ->schema([
                        TextInput::make('donation_link')
                            ->label('رابط التبرع')
                            ->url()
                            ->placeholder('https://donate.example.com/...'),
                        
                        TextInput::make('donation_account_number')
                            ->label('رقم حساب التبرع')
                            ->placeholder('1234567890'),
                        
                        TextInput::make('donation_phone')
                            ->label('رقم هاتف التبرع')
                            ->tel()
                            ->placeholder('01234567890'),
                        
                        TextInput::make('bank_name')
                            ->label('اسم البنك')
                            ->placeholder('البنك الأهلي المصري'),
                        
                        Textarea::make('donation_methods')
                            ->label('طرق التبرع المختلفة')
                            ->placeholder('فودافون كاش، اتصالات كاش، حوالة بنكية...')
                            ->rows(2),
                    ])
                    ->columns(2),
                
                Section::make('تفاصيل الحملة')
                    ->schema([
                        TextInput::make('target_amount')
                            ->label('المبلغ المستهدف (جنيه)')
                            ->numeric()
                            ->prefix('جنيه')
                            ->placeholder('100000'),
                        
                        TextInput::make('collected_amount')
                            ->label('المبلغ المجمع (جنيه)')
                            ->numeric()
                            ->prefix('جنيه')
                            ->default(0),
                        
                        DatePicker::make('campaign_end_date')
                            ->label('تاريخ انتهاء الحملة')
                            ->format('Y-m-d')
                            ->placeholder('اختر التاريخ'),
                    ])
                    ->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ViewColumn::make('image')
                    ->label('الصورة')
                    ->view('filament.tables.columns.hospital-donation-image')
                    ->width('80px')
                    ->alignCenter(),
                
                TextColumn::make('hospital_name')
                    ->label('اسم المستشفى')
                    ->searchable()
                    ->sortable()
                    ->weight(FontWeight::Bold),
                
                TextColumn::make('description')
                    ->label('الوصف')
                    ->limit(50)
                    ->tooltip(function (TextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) <= 50) {
                            return null;
                        }
                        return $state;
                    })
                    ->placeholder('لا يوجد وصف'),
                
                TextColumn::make('donation_account_number')
                    ->label('رقم الحساب')
                    ->copyable()
                    ->copyMessage('تم نسخ رقم الحساب!')
                    ->icon('heroicon-o-credit-card')
                    ->placeholder('غير محدد'),
                
                TextColumn::make('donation_phone')
                    ->label('رقم الهاتف')
                    ->copyable()
                    ->copyMessage('تم نسخ رقم الهاتف!')
                    ->icon('heroicon-o-phone')
                    ->placeholder('غير محدد'),
                
                TextColumn::make('bank_name')
                    ->label('البنك')
                    ->badge()
                    ->color('info')
                    ->placeholder('غير محدد'),
                
                TextColumn::make('formatted_collected_amount')
                    ->label('المبلغ المجمع')
                    ->badge()
                    ->color('success'),
                
                TextColumn::make('formatted_target_amount')
                    ->label('المبلغ المستهدف')
                    ->badge()
                    ->color('warning'),
                
                TextColumn::make('donation_percentage')
                    ->label('النسبة المحققة')
                    ->formatStateUsing(fn ($state) => $state . '%')
                    ->badge()
                    ->color(fn ($state) => match (true) {
                        $state >= 100 => 'success',
                        $state >= 50 => 'warning',
                        default => 'danger',
                    }),
                
                TextColumn::make('campaign_status')
                    ->label('حالة الحملة')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'جارية' => 'info',
                        'مكتملة' => 'success',
                        'منتهية' => 'danger',
                        default => 'gray',
                    }),
                
                TextColumn::make('donation_link')
                    ->label('رابط التبرع')
                    ->url(fn ($record) => $record->donation_link)
                    ->openUrlInNewTab()
                    ->icon('heroicon-o-link')
                    ->limit(0)
                    ->formatStateUsing(fn ($state) => $state ? 'تبرع الآن' : 'غير متوفر')
                    ->color('primary'),
                
                TextColumn::make('campaign_end_date')
                    ->label('تاريخ الانتهاء')
                    ->date('Y-m-d')
                    ->sortable()
                    ->placeholder('غير محدد'),
                
                TextColumn::make('status_arabic')
                    ->label('الحالة')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'نشط' => 'success',
                        'غير نشط' => 'danger',
                        default => 'gray',
                    }),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('حالة التبرع')
                    ->options([
                        'active' => 'نشط',
                        'inactive' => 'غير نشط',
                    ]),
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
            ->defaultSort('created_at', 'desc')
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
            'index' => Pages\ListHospitalDonations::route('/'),
            'create' => Pages\CreateHospitalDonation::route('/create'),
            'edit' => Pages\EditHospitalDonation::route('/{record}/edit'),
        ];
    }
}
