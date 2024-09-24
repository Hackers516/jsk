<?php

namespace App\Filament\Resources\TopProjectResource\Pages;

use App\Filament\Resources\TopProjectResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTopProject extends EditRecord
{
    protected static string $resource = TopProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
