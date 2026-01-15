<?php

namespace App\Filament\Resources\CoachingServiceResource\Pages;

use App\Filament\Resources\CoachingServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCoachingService extends EditRecord
{
    protected static string $resource = CoachingServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
