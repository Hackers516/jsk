<?php

namespace App\Filament\Resources\WhatsNewResource\Pages;

use App\Filament\Resources\WhatsNewResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewWhatsNew extends ViewRecord
{
    protected static string $resource = WhatsNewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
