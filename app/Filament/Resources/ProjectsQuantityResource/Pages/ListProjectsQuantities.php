<?php

namespace App\Filament\Resources\ProjectsQuantityResource\Pages;

use App\Filament\Resources\ProjectsQuantityResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProjectsQuantities extends ListRecords
{
    protected static string $resource = ProjectsQuantityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
