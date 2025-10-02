<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PsychologicalSupportResource\Pages;
use App\Filament\Resources\PsychologicalSupportResource\RelationManagers;
use App\Models\PsychologicalSupport;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PsychologicalSupportResource extends Resource
{
    protected static ?string $model = PsychologicalSupport::class;

    protected static ?string $navigationIcon = 'heroicon-o-hand-raised';
    protected static ?string $navigationLabel = 'الدعم النفسي';
    protected static ?string $navigationGroup = 'مستشاري';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('معلومات الدعم النفسي')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('عنوان المحتوى')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        
                        Forms\Components\Textarea::make('content')
                            ->label('المحتوى')
                            ->required()
                            ->rows(6)
                            ->columnSpanFull(),
                        
                        Forms\Components\Select::make('category')
                            ->label('التصنيف')
                            ->options([
                                'التعامل مع الضغوط' => 'التعامل مع الضغوط',
                                'القلق والاكتئاب' => 'القلق والاكتئاب',
                                'الثقة بالنفس' => 'الثقة بالنفس',
                                'العلاقات الشخصية' => 'العلاقات الشخصية',
                                'التطوير الشخصي' => 'التطوير الشخصي',
                                'عام' => 'عام',
                            ])
                            ->required()
                            ->searchable(),
                        
                        Forms\Components\TextInput::make('therapist_name')
                            ->label('اسم المعالج/المستشار')
                            ->maxLength(255),
                        
                        Forms\Components\FileUpload::make('image')
                            ->label('صورة')
                            ->image()
                            ->directory('psychological-support')
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
                    ->circular()
                    ->defaultImageUrl(url('/images/default-doctor.svg')),
                
                Tables\Columns\TextColumn::make('title')
                    ->label('العنوان')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->limit(50),
                
                Tables\Columns\TextColumn::make('category')
                    ->label('التصنيف')
                    ->badge()
                    ->color('purple')
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('therapist_name')
                    ->label('المعالج')
                    ->searchable(),
                
                Tables\Columns\IconColumn::make('is_active')
                    ->label('نشط')
                    ->boolean(),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime('Y/m/d')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->label('التصنيف'),
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
            'index' => Pages\ListPsychologicalSupports::route('/'),
            'create' => Pages\CreatePsychologicalSupport::route('/create'),
            'edit' => Pages\EditPsychologicalSupport::route('/{record}/edit'),
        ];
    }
}
