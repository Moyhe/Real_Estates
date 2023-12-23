<?php

namespace App\Filament\Resources\EstateMarketResource\Pages;

use App\Filament\Resources\EstateMarketResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewEstateMarket extends ViewRecord
{
    protected static string $resource = EstateMarketResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
