<?php

namespace App\Filament\Resources\EmployeResource\Widgets;

use App\Models\employe;
use App\Models\departement;
use Illuminate\Foundation\Auth\User;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class employeStatsOverview extends BaseWidget
{
    protected function getCards(): array

    {
       $it=departement::where('nomDept','it')->withCount('employe')->first();
        $java=departement::where('nomDept','java')->withCount('employe')->first();
        $securite=departement::where('nomDept','securite')->withCount('employe')->first();
        $telecomunication=departement::where('nomDept','telcommunication')->withCount('employe')->first();
        $reseau=departement::where('nomDept','reseau')->withCount('employe')->first();
        $info=departement::where('nomDept','info')->withCount('employe')->first();
        return [
            Card::make('Nombre des departements', departement::all()->count())
            ->description('existes')
            ->descriptionIcon('heroicon-s-shopping-bag')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('success'),
            Card::make(' Nombre des employes', employe::all()->count())
            ->description('enregistres')
            ->descriptionIcon('heroicon-s-user')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('success'),
            Card::make(' Nombre '."d'utilisateurs", User::all()->count())
            ->description('enregistres')
            ->descriptionIcon('heroicon-s-user')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('success'),
            Card::make(" les employes de ".$it->nomDept, $it->employe_count)
            ->description('actuelement')
            ->descriptionIcon('heroicon-s-user')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('warning'),
            Card::make(" les employes de ".$java->nomDept, $java->employe_count)
            ->description('actuelement')
            ->descriptionIcon('heroicon-s-user')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('warning'),
            Card::make(" les employes de ".$securite->nomDept, $securite->employe_count)
            ->description('actuelement')
            ->descriptionIcon('heroicon-s-user')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('warning'),
            Card::make(" les employes de ". $telecomunication->nomDept,  $telecomunication->employe_count)
            ->description('actuelement')
            ->descriptionIcon('heroicon-s-user')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('warning'),
            Card::make(" les employes de ".$reseau->nomDept, $reseau->employe_count)
            ->description('actuelement')
            ->descriptionIcon('heroicon-s-user')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('warning'),
            Card::make(" les employes de ".$info->nomDept, $info->employe_count)
            ->description('actuelement')
            ->descriptionIcon('heroicon-s-user')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('warning'),
        ];
    }
}
