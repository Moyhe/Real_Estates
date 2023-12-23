<?php

namespace App\Filament\Resources\OwnerEstateResource\Pages;

use App\Filament\Resources\OwnerEstateResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOwnerEstates extends ListRecords
{
    protected static string $resource = OwnerEstateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
