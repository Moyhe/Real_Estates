<?php

namespace App\Filament\Resources\EstateMarketResource\Pages;

use App\Filament\Resources\EstateMarketResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEstateMarkets extends ListRecords
{
    protected static string $resource = EstateMarketResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
