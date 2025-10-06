<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RiadatyChallengeResource\Pages;
use App\Filament\Resources\RiadatyChallengeResource\RelationManagers;
use App\Models\RiadatyChallenge;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RiadatyChallengeResource extends BaseResource
{
    protected static ?string $model = RiadatyChallenge::class;

    protected static ?string $navigationIcon = 'heroicon-o-trophy';
    protected static ?string $navigationLabel = 'التحديات الرياضية';
    protected static ?string $navigationGroup = 'رياضتي';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('معلومات التحدي')
                    ->schema([
                        Forms\Components\TextInput::make('challenge_name')
                            ->label('اسم التحدي')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        
                        Forms\Components\Textarea::make('description')
                            ->label('وصف التحدي')
                            ->required()
                            ->rows(6)
                            ->columnSpanFull(),
                        
                        Forms\Components\Select::make('challenge_type')
                            ->label('نوع التحدي')
                            ->options([
                                'قوة' => 'قوة',
                                'كارديو' => 'كارديو',
                                'مرونة' => 'مرونة',
                                'تحمل' => 'تحمل',
                                'خسارة وزن' => 'خسارة وزن',
                                'بناء عضلات' => 'بناء عضلات',
                                'يوغا' => 'يوغا',
                                'مشي' => 'مشي',
                                'جري' => 'جري',
                                'عام' => 'عام',
                            ])
                            ->required()
                            ->searchable(),
                        
                        Forms\Components\DatePicker::make('start_date')
                            ->label('تاريخ البداية')
                            ->required()
                            ->native(false)
                            ->displayFormat('Y/m/d'),
                        
                        Forms\Components\DatePicker::make('end_date')
                            ->label('تاريخ النهاية')
                            ->required()
                            ->native(false)
                            ->displayFormat('Y/m/d')
                            ->after('start_date'),
                        
                        Forms\Components\TextInput::make('participants_count')
                            ->label('عدد المشاركين')
                            ->numeric()
                            ->default(0)
                            ->minValue(0)
                            ->suffix('مشارك'),
                        
                        Forms\Components\Textarea::make('prizes')
                            ->label('الجوائز')
                            ->rows(3)
                            ->placeholder('مثال: جوائز قيمة للفائزين، شهادات تقدير، جوائز نقدية')
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
                Tables\Columns\TextColumn::make('challenge_name')
                    ->label('اسم التحدي')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->limit(40),
                
                Tables\Columns\TextColumn::make('challenge_type')
                    ->label('النوع')
                    ->badge()
                    ->color('warning')
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('start_date')
                    ->label('تاريخ البداية')
                    ->date('Y/m/d')
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('end_date')
                    ->label('تاريخ النهاية')
                    ->date('Y/m/d')
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('participants_count')
                    ->label('المشاركين')
                    ->numeric()
                    ->sortable()
                    ->alignCenter()
                    ->suffix(' مشارك'),
                
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
                Tables\Filters\SelectFilter::make('challenge_type')
                    ->label('نوع التحدي')
                    ->options([
                        'قوة' => 'قوة',
                        'كارديو' => 'كارديو',
                        'مرونة' => 'مرونة',
                        'تحمل' => 'تحمل',
                        'خسارة وزن' => 'خسارة وزن',
                        'بناء عضلات' => 'بناء عضلات',
                        'يوغا' => 'يوغا',
                        'مشي' => 'مشي',
                        'جري' => 'جري',
                        'عام' => 'عام',
                    ]),
                
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('نشط'),
                
                Tables\Filters\Filter::make('active_challenges')
                    ->label('التحديات النشطة')
                    ->query(fn (Builder $query): Builder => $query->where('end_date', '>=', now())),
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
            ->defaultSort('start_date', 'desc');
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
            'index' => Pages\ListRiadatyChallenges::route('/'),
            'create' => Pages\CreateRiadatyChallenge::route('/create'),
            'edit' => Pages\EditRiadatyChallenge::route('/{record}/edit'),
        ];
    }
}
