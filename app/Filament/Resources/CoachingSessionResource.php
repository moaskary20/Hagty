<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CoachingSessionResource\Pages;
use App\Filament\Resources\CoachingSessionResource\RelationManagers;
use App\Models\CoachingSession;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CoachingSessionResource extends Resource
{
    protected static ?string $model = CoachingSession::class;

    protected static ?string $navigationIcon = 'heroicon-o-microphone'; protected static ?string $navigationLabel = 'جلسات لايف كوتشينج'; protected static ?string $navigationGroup = 'مستمعي'; protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('معلومات الجلسة')
                    ->schema([
                        Forms\Components\TextInput::make('session_title')
                            ->label('عنوان الجلسة')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        
                        Forms\Components\Textarea::make('description')
                            ->label('وصف الجلسة')
                            ->required()
                            ->rows(5)
                            ->columnSpanFull(),
                        
                        Forms\Components\Select::make('topic')
                            ->label('الموضوع')
                            ->options([
                                'التطوير الشخصي' => 'التطوير الشخصي',
                                'القيادة' => 'القيادة',
                                'إدارة الوقت' => 'إدارة الوقت',
                                'تحديد الأهداف' => 'تحديد الأهداف',
                                'التحفيز' => 'التحفيز',
                                'عام' => 'عام',
                            ])
                            ->required()
                            ->searchable(),
                        
                        Forms\Components\TextInput::make('coach_name')
                            ->label('اسم الكوتش')
                            ->maxLength(255),
                        
                        Forms\Components\DateTimePicker::make('session_date')
                            ->label('تاريخ ووقت الجلسة')
                            ->native(false),
                        
                        Forms\Components\TextInput::make('duration_minutes')
                            ->label('مدة الجلسة (بالدقائق)')
                            ->numeric()
                            ->minValue(0),
                        
                        Forms\Components\FileUpload::make('image')
                            ->label('صورة')
                            ->image()
                            ->directory('coaching-sessions')
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
                    ->circular(),
                
                Tables\Columns\TextColumn::make('session_title')
                    ->label('العنوان')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->limit(50),
                
                Tables\Columns\TextColumn::make('topic')
                    ->label('الموضوع')
                    ->badge()
                    ->color('success')
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('coach_name')
                    ->label('الكوتش')
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('session_date')
                    ->label('التاريخ')
                    ->dateTime('Y/m/d H:i')
                    ->sortable(),
                
                Tables\Columns\IconColumn::make('is_active')
                    ->label('نشط')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('topic')
                    ->label('الموضوع'),
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
            ->defaultSort('session_date', 'desc');
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
            'index' => Pages\ListCoachingSessions::route('/'),
            'create' => Pages\CreateCoachingSession::route('/create'),
            'edit' => Pages\EditCoachingSession::route('/{record}/edit'),
        ];
    }
}
