<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FundingOptionResource\Pages;
use App\Filament\Resources\FundingOptionResource\RelationManagers;
use App\Models\FundingOption;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FundingOptionResource extends Resource
{
    protected static ?string $model = FundingOption::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?string $navigationLabel = 'خيارات التمويل';
    protected static ?string $navigationGroup = 'مشروعي';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('معلومات التمويل')
                    ->schema([
                        Forms\Components\TextInput::make('funding_type')
                            ->label('نوع التمويل')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('مثال: قرض بنكي، مستثمر ملاك، تمويل جماعي')
                            ->columnSpanFull(),
                        
                        Forms\Components\Textarea::make('description')
                            ->label('وصف التمويل')
                            ->required()
                            ->rows(5)
                            ->columnSpanFull(),
                        
                        Forms\Components\TextInput::make('provider_name')
                            ->label('اسم المزود/الجهة')
                            ->maxLength(255)
                            ->placeholder('مثال: البنك الأهلي المصري'),
                        
                        Forms\Components\TextInput::make('funding_range')
                            ->label('نطاق التمويل')
                            ->maxLength(255)
                            ->placeholder('مثال: 10,000 - 500,000 جنيه'),
                        
                        Forms\Components\Textarea::make('requirements')
                            ->label('المتطلبات')
                            ->rows(4)
                            ->placeholder('المستندات والشروط المطلوبة')
                            ->columnSpanFull(),
                        
                        Forms\Components\TextInput::make('contact_info')
                            ->label('معلومات التواصل')
                            ->maxLength(255)
                            ->placeholder('بريد أو هاتف'),
                        
                        Forms\Components\TextInput::make('website_url')
                            ->label('الموقع الإلكتروني')
                            ->url()
                            ->maxLength(255),
                        
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
                Tables\Columns\TextColumn::make('funding_type')
                    ->label('نوع التمويل')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                
                Tables\Columns\TextColumn::make('provider_name')
                    ->label('المزود')
                    ->searchable()
                    ->limit(30),
                
                Tables\Columns\TextColumn::make('funding_range')
                    ->label('النطاق')
                    ->limit(30),
                
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
            'index' => Pages\ListFundingOptions::route('/'),
            'create' => Pages\CreateFundingOption::route('/create'),
            'edit' => Pages\EditFundingOption::route('/{record}/edit'),
        ];
    }
}
