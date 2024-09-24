<?php

namespace App\Filament\Resources\BoardOfMemberResource\Pages;

use App\Filament\Resources\BoardOfMemberResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBoardOfMember extends EditRecord
{
    protected static string $resource = BoardOfMemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
