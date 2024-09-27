<?php

namespace App\Filament\Resources\CompleteProjectsResource\Pages;

use App\Filament\Resources\CompleteProjectsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCompleteProjects extends EditRecord
{
    protected static string $resource = CompleteProjectsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
