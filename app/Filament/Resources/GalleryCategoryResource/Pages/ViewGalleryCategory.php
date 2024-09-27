<?php

namespace App\Filament\Resources\GalleryCategoryResource\Pages;

use App\Filament\Resources\GalleryCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewGalleryCategory extends ViewRecord
{
    protected static string $resource = GalleryCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
