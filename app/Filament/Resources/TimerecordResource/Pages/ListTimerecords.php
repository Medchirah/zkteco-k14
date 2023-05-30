<?php

namespace App\Filament\Resources\TimerecordResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\TimerecordResource;
use App\Filament\Resources\TimerecordResource\Widgets\timerecordStatsOverview;

class ListTimerecords extends ListRecords
{
    protected static string $resource = TimerecordResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    protected function getFooterWidgets(): array
    {
        return[
            timerecordStatsOverview::class,
        ];
    }

}
