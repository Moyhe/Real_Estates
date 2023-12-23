<?php

namespace App\Filament\Resources\SupplyEstatesResource\Pages;

use App\Filament\Resources\SupplyEstatesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSupplyEstates extends ListRecords
{
    protected static string $resource = SupplyEstatesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
