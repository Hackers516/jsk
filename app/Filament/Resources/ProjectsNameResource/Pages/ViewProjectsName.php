<?php

namespace App\Filament\Resources\ProjectsNameResource\Pages;

use App\Filament\Resources\ProjectsNameResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewProjectsName extends ViewRecord
{
    protected static string $resource = ProjectsNameResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
