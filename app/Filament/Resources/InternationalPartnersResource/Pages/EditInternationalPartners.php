<?php

namespace App\Filament\Resources\InternationalPartnersResource\Pages;

use App\Filament\Resources\InternationalPartnersResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInternationalPartners extends EditRecord
{
    protected static string $resource = InternationalPartnersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
