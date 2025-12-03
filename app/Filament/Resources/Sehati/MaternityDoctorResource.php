<?php

namespace App\Filament\Resources\Sehati;

use App\Filament\Resources\Sehati\MaternityDoctorResource\Pages;
use App\Models\MaternityDoctor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Columns\BadgeColumn;

class MaternityDoctorResource extends Resource
{
    protected static ?string $model = MaternityDoctor::class;
    protected static ?string $navigationGroup = 'أومومتي';
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'أطباء النساء والتوليد';
    protected static ?string $label = 'طبيب';
    protected static ?string $pluralLabel = 'أطباء النساء والتوليد';
    protected static ?int $navigationSort = 1;
    protected static bool $shouldRegisterNavigation = true;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Card::make()
                ->schema([
                    TextInput::make('name')
                        ->label('اسم الطبيب')
                        ->required()
                        ->maxLength(255),

                    TextInput::make('title')
                        ->label('المسمى الوظيفي')
                        ->maxLength(255),

                    TextInput::make('specialty')
                        ->label('التخصص')
                        ->maxLength(255),

                    TextInput::make('clinic_name')
                        ->label('اسم العيادة')
                        ->maxLength(255),

                    Textarea::make('clinic_address')
                        ->label('عنوان العيادة')
                        ->rows(3),

                    TextInput::make('google_maps_url')
                        ->label('رابط خرائط جوجل')
                        ->url()
                        ->maxLength(255),

                    FileUpload::make('profile_image')
                        ->label('صورة الطبيب')
                        ->image()
                        ->directory('maternity-doctors'),

                    TextInput::make('years_of_experience')
                        ->label('سنوات الخبرة')
                        ->numeric()
                        ->minValue(0),

                    TextInput::make('consultation_fees')
                        ->label('رسوم الاستشارة')
                        ->maxLength(255),

                    TextInput::make('rating')
                        ->label('التقييم')
                        ->numeric()
                        ->minValue(0)
                        ->maxValue(5)
                        ->step(0.1),

                    Textarea::make('description')
                        ->label('الوصف')
                        ->rows(4),

                    Select::make('is_verified')
                        ->label('موثق')
                        ->options([
                            true => 'نعم',
                            false => 'لا',
                        ])
                        ->default(false),

                    Select::make('is_featured')
                        ->label('مميز')
                        ->options([
                            true => 'نعم',
                            false => 'لا',
                        ])
                        ->default(false),

                    Select::make('is_active')
                        ->label('نشط')
                        ->options([
                            true => 'نعم',
                            false => 'لا',
                        ])
                        ->default(true),
                ])
                ->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('profile_image')
                    ->label('الصورة')
                    ->circular()
                    ->defaultImageUrl('https://ui-avatars.com/api/?name=Doctor&color=7C3AED&background=EBF4FF'),

                TextColumn::make('name')
                    ->label('اسم الطبيب')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('title')
                    ->label('المسمى الوظيفي')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('specialty')
                    ->label('التخصص')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('clinic_name')
                    ->label('اسم العيادة')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('years_of_experience')
                    ->label('سنوات الخبرة')
                    ->sortable(),

                TextColumn::make('consultation_fees')
                    ->label('رسوم الاستشارة')
                    ->sortable(),

                TextColumn::make('rating')
                    ->label('التقييم')
                    ->sortable()
                    ->formatStateUsing(fn ($state) => $state ? number_format($state, 1) : 'غير محدد'),

                ToggleColumn::make('is_verified')
                    ->label('موثق')
                    ->sortable(),

                ToggleColumn::make('is_featured')
                    ->label('مميز')
                    ->sortable(),

                ToggleColumn::make('is_active')
                    ->label('نشط')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('تاريخ الإضافة')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('specialty')
                    ->label('التخصص')
                    ->options(function () {
                        return MaternityDoctor::query()
                            ->whereNotNull('specialty')
                            ->where('specialty', '!=', '')
                            ->distinct()
                            ->orderBy('specialty')
                            ->pluck('specialty')
                            ->filter(fn ($value) => !is_null($value) && $value !== '')
                            ->mapWithKeys(fn ($value) => [(string) $value => (string) $value])
                            ->toArray();
                    }),

                Tables\Filters\TernaryFilter::make('is_verified')
                    ->label('موثق'),

                Tables\Filters\TernaryFilter::make('is_featured')
                    ->label('مميز'),

                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('نشط'),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->color('primary'),
                Tables\Actions\DeleteAction::make()
                    ->color('danger'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateHeading('لا يوجد أطباء أمومة')
            ->emptyStateDescription('قم بإضافة طبيب أمومة جديد للبدء')
            ->emptyStateIcon('heroicon-o-user-plus')
            ->striped()
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageMaternityDoctors::route('/'),
            'create' => Pages\CreateMaternityDoctor::route('/create'),
            'edit' => Pages\EditMaternityDoctor::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return true;
    }
}
