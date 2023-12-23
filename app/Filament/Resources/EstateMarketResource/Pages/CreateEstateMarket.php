<?php

namespace App\Filament\Resources\EstateMarketResource\Pages;

use App\Filament\Resources\EstateMarketResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEstateMarket extends CreateRecord
{
    protected static string $resource = EstateMarketResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
