<?php

namespace App\Filament\Resources\CompleteProjectsResource\Pages;

use App\Filament\Resources\CompleteProjectsResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCompleteProjects extends ViewRecord
{
    protected static string $resource = CompleteProjectsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
