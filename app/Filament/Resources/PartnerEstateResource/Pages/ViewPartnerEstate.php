<?php

namespace App\Filament\Resources\PartnerEstateResource\Pages;

use App\Filament\Resources\PartnerEstateResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPartnerEstate extends ViewRecord
{
    protected static string $resource = PartnerEstateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
