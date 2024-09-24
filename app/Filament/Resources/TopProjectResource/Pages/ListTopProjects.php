<?php

namespace App\Filament\Resources\TopProjectResource\Pages;

use App\Filament\Resources\TopProjectResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTopProjects extends ListRecords
{
    protected static string $resource = TopProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
