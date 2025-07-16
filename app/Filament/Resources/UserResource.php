<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'المستخدمين';
    protected static ?string $pluralLabel = 'كل المستخدمين';
    protected static ?string $label = 'مستخدم';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('اسم المستخدم')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->label('البريد الإلكتروني')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('roles')
                    ->label('الأدوار')
                    ->relationship('roles', 'name')
                    ->multiple()
                    ->preload()
                    ->helperText('حدد الأدوار لهذا المستخدم'),
                Forms\Components\Select::make('permissions')
                    ->label('الصلاحيات')
                    ->relationship('permissions', 'name')
                    ->multiple()
                    ->preload()
                    ->helperText('حدد الصلاحيات الإضافية لهذا المستخدم'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('الرقم')->sortable(),
                Tables\Columns\TextColumn::make('name')->label('اسم المستخدم')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('email')->label('البريد الإلكتروني')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('created_at')->label('تاريخ الإنشاء')->dateTime()->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label('تعديل'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->label('حذف'),
                ]),
            ]);
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
