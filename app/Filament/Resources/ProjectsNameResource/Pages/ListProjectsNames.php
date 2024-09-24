<?php

namespace App\Filament\Resources\ProjectsNameResource\Pages;

use App\Filament\Resources\ProjectsNameResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProjectsNames extends ListRecords
{
    protected static string $resource = ProjectsNameResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
