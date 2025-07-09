<?php
namespace App\Filament\Resources\Sehati;

use App\Filament\Resources\Sehati\DoctorResource\Pages;
use App\Models\Doctor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DoctorResource extends Resource
{
    protected static ?string $model = Doctor::class;
    protected static ?string $navigationGroup = 'صحتي';
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'دليل الأطباء';
    protected static ?string $label = 'طبيب';
    protected static ?string $pluralLabel = 'الأطباء';
    protected static bool $shouldRegisterNavigation = true;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Card::make()
                ->schema([
                    Forms\Components\Grid::make(2)
                        ->schema([
                            Forms\Components\TextInput::make('first_name')
                                ->label('الاسم')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('last_name')
                                ->label('اللقب')
                                ->required()
                                ->maxLength(255),
                        ]),
                    Forms\Components\Grid::make(2)
                        ->schema([
                            Forms\Components\TextInput::make('specialty')
                                ->label('التخصص')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('clinic_address')
                                ->label('عنوان العيادة')
                                ->required()
                                ->maxLength(255),
                        ]),
                    Forms\Components\Repeater::make('phone')
                        ->label('أرقام الهاتف')
                        ->schema([
                            Forms\Components\TextInput::make('number')
                                ->label('رقم الهاتف')
                                ->tel()
                                ->required(),
                        ])
                        ->minItems(1)
                        ->maxItems(5)
                        ->defaultItems(1)
                        ->required()
                        ->collapsible()
                        ->cloneable(),
                    Forms\Components\Grid::make(2)
                        ->schema([
                            Forms\Components\TextInput::make('google_maps_url')
                                ->label('رابط Google Maps')
                                ->url()
                                ->nullable(),
                            Forms\Components\TextInput::make('booking_url')
                                ->label('رابط الحجز')
                                ->url()
                                ->nullable(),
                        ]),
                    Forms\Components\FileUpload::make('image')
                        ->label('صورة')
                        ->image()
                        ->directory('doctors')
                        ->disk('public')
                        ->visibility('public')
                        ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif'])
                        ->maxSize(2048)
                        ->imageEditor()
                        ->nullable()
                        ->helperText('اختر صورة للطبيب (الحد الأقصى: 2MB)'),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ViewColumn::make('image')
                    ->label('صورة')
                    ->view('filament.tables.columns.doctor-image'),
                Tables\Columns\TextColumn::make('full_name')
                    ->label('الاسم الكامل')
                    ->formatStateUsing(fn ($record) => $record->first_name . ' ' . $record->last_name)
                    ->searchable(['first_name', 'last_name'])
                    ->sortable(),
                Tables\Columns\TextColumn::make('specialty')
                    ->label('التخصص')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('primary'),
                Tables\Columns\TextColumn::make('clinic_address')
                    ->label('عنوان العيادة')
                    ->searchable()
                    ->limit(30)
                    ->tooltip(fn ($record) => $record->clinic_address),
                Tables\Columns\ViewColumn::make('phone')
                    ->label('أرقام الهاتف')
                    ->view('filament.tables.columns.doctor-phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('google_maps_url')
                    ->label('Google Maps')
                    ->url(fn ($record) => $record->google_maps_url)
                    ->openUrlInNewTab()
                    ->limit(30)
                    ->formatStateUsing(fn ($state) => $state ? 'موقع' : 'لا يوجد')
                    ->badge()
                    ->color(fn ($state) => $state ? 'info' : 'gray'),
                Tables\Columns\TextColumn::make('booking_url')
                    ->label('رابط الحجز')
                    ->url(fn ($record) => $record->booking_url)
                    ->openUrlInNewTab()
                    ->limit(30)
                    ->formatStateUsing(fn ($state) => $state ? 'احجز' : 'لا يوجد')
                    ->badge()
                    ->color(fn ($state) => $state ? 'warning' : 'gray'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('تاريخ الإضافة')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('specialty')
                    ->label('التخصص')
                    ->options(function () {
                        return Doctor::distinct()->pluck('specialty', 'specialty')->toArray();
                    }),
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
            ->emptyStateHeading('لا يوجد أطباء')
            ->emptyStateDescription('قم بإضافة طبيب جديد للبدء')
            ->emptyStateIcon('heroicon-o-user-plus')
            ->striped()
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageDoctors::route('/'),
            'create' => Pages\CreateDoctor::route('/create'),
            'edit' => Pages\EditDoctor::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return true;
    }
}
