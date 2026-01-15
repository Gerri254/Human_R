<?php

namespace App\Filament\Resources\ExclusiveResource\Pages;

use App\Filament\Resources\ExclusiveResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateExclusive extends CreateRecord
{
    protected static string $resource = ExclusiveResource::class;
}
