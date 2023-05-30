<?php

namespace App\Filament\Resources\TimerecordResource\Widgets;

use Carbon\Carbon;
use App\Models\employe;
use App\Models\timerecord;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class timerecordStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        
        $nbrheure=timerecord::where('employe_id','1')->sum( 'durration');
       // $timeIn = Carbon::parse( $nbrheure);
        //$heure =  $nbrheure->format('H');
        //$minutes =  $nbrheure->format('i');
        //$secondes =  $nbrheure->format('s');
        //$timework= "$heure:$minutes:$secondes";
        $employe=employe::where('id','1')->first();
        $nbrheure1=timerecord::where('employe_id','6')->sum( 'durration');
        $employe1=employe::where('id','6')->first();
        $nbrheure2=timerecord::where('employe_id','7')->sum( 'durration');
        $employe2=employe::where('id','7')->first();
        
        
       
        return [
            Card::make(' les employes presents pour '.'l'.'instant', timerecord::groupBy('employe_id')->count())
            ->description('existe')
            ->descriptionIcon('heroicon-s-beaker')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('success'),
            Card::make(' les employes absents pour '.'l'.'instant',employe::all()->count()- timerecord::groupBy('employe_id')->count())
            ->description('existe')
            ->descriptionIcon('heroicon-s-beaker')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('success'),
            Card::make(' tous les employes ', employe::all()->count())
            ->description('existe')
            ->descriptionIcon('heroicon-s-shopping-bag')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('success'),
            Card::make($employe->nom.' a travaille',  $nbrheure)
            ->description('jusqu'."a maintenant")
            ->descriptionIcon('heroicon-s-shopping-bag')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('warning'),
            Card::make($employe1->nom.' a travaille',  $nbrheure1)
            ->description('jusqu'."a maintenant")
            ->descriptionIcon('heroicon-s-shopping-bag')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('warning'),
            Card::make($employe2->nom.' a travaille',  $nbrheure2)
            ->description('jusqu'."a maintenant")
            ->descriptionIcon('heroicon-s-shopping-bag')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('warning'),
            
        ];
    }
}
