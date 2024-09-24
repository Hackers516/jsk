<?php

namespace App\Filament\Resources\ProjectsNameResource\Pages;

use App\Filament\Resources\ProjectsNameResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProjectsName extends EditRecord
{
    protected static string $resource = ProjectsNameResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
