<?php

namespace App\Filament\Resources\BoardOfMemberResource\Pages;

use App\Filament\Resources\BoardOfMemberResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBoardOfMembers extends ListRecords
{
    protected static string $resource = BoardOfMemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
