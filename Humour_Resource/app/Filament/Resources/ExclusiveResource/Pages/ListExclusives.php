<?php

namespace App\Filament\Resources\ExclusiveResource\Pages;

use App\Filament\Resources\ExclusiveResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListExclusives extends ListRecords
{
    protected static string $resource = ExclusiveResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
