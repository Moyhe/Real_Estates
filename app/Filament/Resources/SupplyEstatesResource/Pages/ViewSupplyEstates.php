<?php

namespace App\Filament\Resources\SupplyEstatesResource\Pages;

use App\Filament\Resources\SupplyEstatesResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSupplyEstates extends ViewRecord
{
    protected static string $resource = SupplyEstatesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
