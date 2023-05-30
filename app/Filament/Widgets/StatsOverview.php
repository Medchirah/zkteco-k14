<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\device;
use App\Models\employe;
use App\Models\timerecord;
use App\Models\departement;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make(' departements number', departement::all()->count())
            ->description('existe')
            ->descriptionIcon('heroicon-s-shopping-bag')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('success'),
            Card::make(' Nombre total des employes', employe::all()->count())
            ->description('enregistres')
            ->descriptionIcon('heroicon-s-user')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('success'),
            Card::make('Nombre '."d'utilisateurs", User::all()->count())
            ->description('enregistres')
            ->descriptionIcon('heroicon-s-user')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('success'),
            Card::make(' tous les pointeuse', device::all()->count())
            ->description('total')
            ->descriptionIcon('heroicon-s-calculator')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('warning'),
            Card::make(' tous les pointeuse connectes', device::where('connect',true)->count())
            ->description('connectes')
            ->descriptionIcon('heroicon-s-lock-open')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('success'),
            Card::make(' tous les pointeuse  deconnectes', device::where('connect',false)->count())
            ->description('deconnectes')
            ->descriptionIcon('heroicon-s-lock-closed')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('danger'),
            Card::make(' les employes presents pour '.'l'.'instant', timerecord::all()->count())
            ->description('existe')
            ->descriptionIcon('heroicon-s-beaker')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('success'),
            Card::make(' les employes absents pour '.'l'.'instant',employe::all()->count()- timerecord::all()->count())
            ->description('existe')
            ->descriptionIcon('heroicon-s-beaker')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('success'),
           
        ];
    }
    protected static ?string $pollingInterval = '86400s';
}
