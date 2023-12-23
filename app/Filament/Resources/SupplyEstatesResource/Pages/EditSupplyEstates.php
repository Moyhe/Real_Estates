<?php

namespace App\Filament\Resources\SupplyEstatesResource\Pages;

use App\Filament\Resources\SupplyEstatesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSupplyEstates extends EditRecord
{
    protected static string $resource = SupplyEstatesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
