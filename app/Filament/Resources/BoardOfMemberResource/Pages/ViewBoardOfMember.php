<?php

namespace App\Filament\Resources\BoardOfMemberResource\Pages;

use App\Filament\Resources\BoardOfMemberResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewBoardOfMember extends ViewRecord
{
    protected static string $resource = BoardOfMemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
