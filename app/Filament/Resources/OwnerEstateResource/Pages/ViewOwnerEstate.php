<?php

namespace App\Filament\Resources\OwnerEstateResource\Pages;

use App\Filament\Resources\OwnerEstateResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewOwnerEstate extends ViewRecord
{
    protected static string $resource = OwnerEstateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
