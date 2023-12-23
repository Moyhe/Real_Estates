<?php

namespace App\Filament\Resources\EstateMarketResource\Pages;

use App\Filament\Resources\EstateMarketResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEstateMarket extends EditRecord
{
    protected static string $resource = EstateMarketResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
