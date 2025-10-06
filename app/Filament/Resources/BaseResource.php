<?php

namespace App\Filament\Resources;

use Filament\Resources\Resource;
use Filament\Tables;
use Illuminate\Database\Eloquent\Model;

abstract class BaseResource extends Resource
{
    /**
     * Default actions for all resources
     */
    protected static function getDefaultActions(): array
    {
        return [
            Tables\Actions\ViewAction::make(),
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make()
                ->requiresConfirmation(false)
                ->action(function ($record) {
                    $record->delete();
                }),
        ];
    }
    
    /**
     * Default bulk actions for all resources
     */
    protected static function getDefaultBulkActions(): array
    {
        return [
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make()
                    ->requiresConfirmation(false)
                    ->action(function ($records) {
                        foreach ($records as $record) {
                            $record->delete();
                        }
                    }),
            ]),
        ];
    }
    
    /**
     * Default authorization methods for all resources
     */
    public static function canView($record): bool
    {
        return true;
    }
    
    public static function canViewAny(): bool
    {
        return true;
    }
    
    public static function canCreate(): bool
    {
        return true;
    }
    
    public static function canEdit($record): bool
    {
        return true;
    }
    
    public static function canDelete($record): bool
    {
        return true;
    }
    
    public static function canDeleteAny(): bool
    {
        return true;
    }
    
    public static function canRestore($record): bool
    {
        return false;
    }
    
    public static function canRestoreAny(): bool
    {
        return false;
    }
    
    public static function canReplicate($record): bool
    {
        return false;
    }
    
    public static function canReplicateAny(): bool
    {
        return false;
    }
}
