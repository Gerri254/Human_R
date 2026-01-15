<?php

namespace App\Filament\Resources\CoachingServiceResource\Pages;

use App\Filament\Resources\CoachingServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCoachingServices extends ListRecords
{
    protected static string $resource = CoachingServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
