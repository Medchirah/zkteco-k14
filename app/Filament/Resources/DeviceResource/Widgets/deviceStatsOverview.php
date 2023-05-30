<?php

namespace App\Filament\Resources\DeviceResource\Widgets;

use App\Models\device;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class deviceStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
      //  $connected=device::where('connect','true')->withCount('device')->first();
    // $unconnected=device::where('connect','false')->withCount('device')->first();
        return [
            Card::make(' tous les ponteuse', device::all()->count())
            ->description('total')
            ->descriptionIcon('heroicon-s-calculator')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('bleu'),
            Card::make(' tous les ponteuse connectes', device::where('connect',true)->count())
            ->description('connectes')
            ->descriptionIcon('heroicon-s-lock-open')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('success'),
            Card::make(' tous les ponteuse  deconnectes', device::where('connect',false)->count())
            ->description('deconnectes')
            ->descriptionIcon('heroicon-s-lock-closed')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('danger'),
        ];
    }
}
