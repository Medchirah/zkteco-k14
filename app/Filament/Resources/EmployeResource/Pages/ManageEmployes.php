<?php

namespace App\Filament\Resources\EmployeResource\Pages;

use Filament\Pages\Actions;
use App\Filament\Resources\EmployeResource;
use Filament\Resources\Pages\ManageRecords;
use CustomerResource\Widgets\employeOverview;
use App\Filament\Resources\EmployeResource\Widgets\employeStatsOverview;

class ManageEmployes extends ManageRecords
{
    protected static string $resource = EmployeResource::class;
   

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    protected function getFooterWidgets():array{
        return[
            employeStatsOverview::class,
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
   
}
