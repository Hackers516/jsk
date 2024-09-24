<?php

namespace App\Filament\Resources\TopProjectResource\Pages;

use App\Filament\Resources\TopProjectResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTopProject extends ViewRecord
{
    protected static string $resource = TopProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
