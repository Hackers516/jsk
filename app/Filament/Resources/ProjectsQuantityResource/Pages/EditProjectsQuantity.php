<?php

namespace App\Filament\Resources\ProjectsQuantityResource\Pages;

use App\Filament\Resources\ProjectsQuantityResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProjectsQuantity extends EditRecord
{
    protected static string $resource = ProjectsQuantityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
