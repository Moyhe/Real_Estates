<?php

namespace App\Filament\Resources\PartnerEstateResource\Pages;

use App\Filament\Resources\PartnerEstateResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPartnerEstate extends EditRecord
{
    protected static string $resource = PartnerEstateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
