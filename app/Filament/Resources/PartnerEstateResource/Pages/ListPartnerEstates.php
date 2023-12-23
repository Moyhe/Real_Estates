<?php

namespace App\Filament\Resources\PartnerEstateResource\Pages;

use App\Filament\Resources\PartnerEstateResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPartnerEstates extends ListRecords
{
    protected static string $resource = PartnerEstateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
