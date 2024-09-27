<?php

namespace App\Filament\Resources\InternationalPartnersResource\Pages;

use App\Filament\Resources\InternationalPartnersResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewInternationalPartners extends ViewRecord
{
    protected static string $resource = InternationalPartnersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
