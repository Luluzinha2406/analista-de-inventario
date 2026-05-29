<?php

namespace App\Filament\Resources\SupervisoraResource\Pages;

use App\Filament\Resources\SupervisoraResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSupervisoras extends ListRecords
{
    protected static string $resource = SupervisoraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
