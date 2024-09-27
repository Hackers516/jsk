<?php

namespace App\Filament\Resources\WhatsNewResource\Pages;

use App\Filament\Resources\WhatsNewResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWhatsNew extends EditRecord
{
    protected static string $resource = WhatsNewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
