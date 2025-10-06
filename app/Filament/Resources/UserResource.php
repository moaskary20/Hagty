<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends BaseResource
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
                Forms\Components\TextInput::make('password')
                    ->label('كلمة المرور')
                    ->password()
                    ->required()
                    ->maxLength(255)
                    ->dehydrateStateUsing(fn($state) => bcrypt($state))
                    ->visible(fn($livewire) => $livewire instanceof \Filament\Resources\Pages\CreateRecord),
                Forms\Components\CheckboxList::make('roles')
                    ->label('الأدوار')
                    ->options(fn () => \Spatie\Permission\Models\Role::all()->pluck('name', 'id'))
                    ->columns(2)
                    ->helperText('حدد الأدوار لهذا المستخدم')
                    ->extraAttributes(['class' => 'custom-role-checkbox']),
                Forms\Components\CheckboxList::make('permissions')
                    ->label('الصلاحيات')
                    ->options(fn () => \Spatie\Permission\Models\Permission::all()->pluck('name', 'id'))
                    ->columns(2)
                    ->helperText('حدد الصلاحيات الإضافية لهذا المستخدم')
                    ->extraAttributes(['class' => 'custom-permission-checkbox']),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('الرقم')->sortable(),
                Tables\Columns\TextColumn::make('name')->label('اسم المستخدم')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('email')->label('البريد الإلكتروني')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('roles.name')->label('الأدوار')->badge()->limit(3),
                Tables\Columns\TextColumn::make('permissions.name')->label('الصلاحيات')->badge()->limit(3),
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
