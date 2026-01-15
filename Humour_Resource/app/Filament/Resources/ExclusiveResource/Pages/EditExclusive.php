<?php

namespace App\Filament\Resources\ExclusiveResource\Pages;

use App\Filament\Resources\ExclusiveResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditExclusive extends EditRecord
{
    protected static string $resource = ExclusiveResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
