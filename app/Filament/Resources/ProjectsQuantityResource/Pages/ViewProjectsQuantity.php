<?php

namespace App\Filament\Resources\ProjectsQuantityResource\Pages;

use App\Filament\Resources\ProjectsQuantityResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewProjectsQuantity extends ViewRecord
{
    protected static string $resource = ProjectsQuantityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
