<?php

namespace App\Filament\Resources\CompleteProjectsResource\Pages;

use App\Filament\Resources\CompleteProjectsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCompleteProjects extends ListRecords
{
    protected static string $resource = CompleteProjectsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
