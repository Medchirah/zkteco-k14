<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use Filament\Forms;
use Filament\Tables;
use App\Models\device;
use App\Models\employe;
use App\Models\shifttime;
use App\Models\tabletime;
use App\Models\Timerecord;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Forms\Components\TimePicker;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\DateTimePicker;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TimerecordResource\Pages;
use App\Filament\Resources\TimerecordResource\RelationManagers;
use App\Filament\Resources\TimerecordResource\Widgets\timerecordStatsOverview;


class TimerecordResource extends Resource
{
    protected static ?string $model = Timerecord::class;

    protected static ?string $navigationIcon = 'heroicon-o-finger-print';
    protected static ?string $navigationGroup = 'Devices/Timerecords management';
  //  protected static ?string $recordTitleAttribute = 'timerecords';
  protected static ?string $modelLabel = 'pointage des employes';


    public static function form(Form $form): Form
    {
        ColorPicker::make('#00ff00');
        return $form
        
    
            ->schema([
                 Card::make()
                ->extraAttributes(['class' => 'bg-gray-50'])
                ->schema([
            Select::make('employe_id')
                ->relationship('employe', 'nom')
                ->options(employe::all()->pluck('nom', 'id'))
                ->searchable(),
            Select::make('device_id')
                ->relationship('device', 'nomDevice')
                ->options(device::all()->pluck('nomDevice', 'id'))
                ->searchable(), 
            Select::make('tabletime_id')
                ->relationship('tabletime', 'id')
                ->options(tabletime::all()->pluck('id', 'id'))
                ->searchable(), 
                
               
                       
            TimePicker::make('time_in')
                    ,
            TimePicker::make('time_out')
                    ,
           // TextInput::make('durration')
                    //->required(),
       
                    ])
               
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                
                Tables\Columns\TextColumn::make('employe.nom')->icon('heroicon-s-user')->size('lg')
                ->weight('semibold'),
                Tables\Columns\TextColumn::make('device.nomDevice')->label('Pointeuse')->icon('heroicon-s-device-tablet')->color('warning')->weight('semibold')->size('lg'),
                
                
                BadgeColumn::make('time_in')->icon('heroicon-s-clock')->label('Pointage '."d'entre")
                ->color('primary')->weight('semibold')->size('lg')
                    ,
                BadgeColumn::make('time_out')->weight('semibold')->size('lg')->label('Pointage de sortie ')
                ->icon('heroicon-s-clock')->color('danger') ,
                BadgeColumn::make('durration')->label('Durre de travaille')->icon('heroicon-s-chart-pie')->size('lg')->weight('semibold')->color('success')
                
               ,
              // TextColumn::make('late_in')->size('lg')->weight('semibold')
                
             //  ,
               
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTimerecords::route('/'),
            'create' => Pages\CreateTimerecord::route('/create'),
            'edit' => Pages\EditTimerecord::route('/{record}/edit'),
        ];
    }    
    public static function getWidgets():array
    {
       return[
        timerecordStatsOverview::class,
       ];
    }
}
