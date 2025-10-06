<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WomenInitiativeResource\Pages;
use App\Filament\Resources\WomenInitiativeResource\RelationManagers;
use App\Models\WomenInitiative;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WomenInitiativeResource extends BaseResource
{
    protected static ?string $model = WomenInitiative::class;

    protected static ?string $navigationIcon = 'heroicon-o-globe-alt'; protected static ?string $navigationLabel = 'مبادرات تمكين المرأة'; protected static ?string $navigationGroup = 'نساء الغد'; protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('معلومات المبادرة')
                    ->schema([
                        Forms\Components\TextInput::make('initiative_name')
                            ->label('اسم المبادرة')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        
                        Forms\Components\Textarea::make('description')
                            ->label('الوصف')
                            ->required()
                            ->rows(5)
                            ->columnSpanFull(),
                        
                        Forms\Components\Select::make('initiative_type')
                            ->label('نوع المبادرة')
                            ->options([
                                'شبكة مهنية' => 'شبكة مهنية',
                                'برنامج تدريب' => 'برنامج تدريب',
                                'مشروع تمكين' => 'مشروع تمكين',
                                'حملة توعية' => 'حملة توعية',
                                'مجتمع داعم' => 'مجتمع داعم',
                                'عام' => 'عام',
                            ])
                            ->required()
                            ->searchable(),
                        
                        Forms\Components\TextInput::make('organizer')
                            ->label('الجهة المنظمة')
                            ->required()
                            ->maxLength(255),
                        
                        Forms\Components\TextInput::make('contact_email')
                            ->label('البريد الإلكتروني')
                            ->email()
                            ->maxLength(255),
                        
                        Forms\Components\TextInput::make('contact_phone')
                            ->label('رقم الهاتف')
                            ->tel()
                            ->maxLength(255),
                        
                        Forms\Components\TextInput::make('website_url')
                            ->label('موقع الويب')
                            ->url()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        
                        Forms\Components\TextInput::make('members_count')
                            ->label('عدد الأعضاء')
                            ->numeric()
                            ->minValue(0)
                            ->default(0),
                        
                        Forms\Components\FileUpload::make('image')
                            ->label('صورة')
                            ->image()
                            ->directory('women-initiatives')
                            ->columnSpanFull(),
                        
                        Forms\Components\Toggle::make('is_active')
                            ->label('نشط')
                            ->default(true),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('الصورة')
                    ->square()
                    ->size(60),
                
                Tables\Columns\TextColumn::make('initiative_name')
                    ->label('اسم المبادرة')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->limit(40),
                
                Tables\Columns\TextColumn::make('initiative_type')
                    ->label('النوع')
                    ->badge()
                    ->color('warning')
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('organizer')
                    ->label('المنظم')
                    ->searchable()
                    ->limit(30),
                
                Tables\Columns\TextColumn::make('members_count')
                    ->label('الأعضاء')
                    ->numeric()
                    ->sortable(),
                
                Tables\Columns\IconColumn::make('is_active')
                    ->label('نشط')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('initiative_type')
                    ->label('نوع المبادرة'),
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('نشط'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListWomenInitiatives::route('/'),
            'create' => Pages\CreateWomenInitiative::route('/create'),
            'edit' => Pages\EditWomenInitiative::route('/{record}/edit'),
        ];
    }
}
