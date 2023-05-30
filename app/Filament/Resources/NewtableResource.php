<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Newtable;
use App\Models\departement;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\NewtableResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use App\Filament\Resources\NewtableResource\RelationManagers;
use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;

class NewtableResource extends Resource
{
    protected static ?string $model = Newtable::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationGroup = 'Attendace Reporting';
    protected static ?string $recordTitleAttribute = 'rapport';
    protected static ?string $modelLabel = 'rapport de presence';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nom_employe')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nom_departement')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('gender')
                    ->label('sexe')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('date debut de thavaille')
                    ->required(),
                Forms\Components\TextInput::make('device')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('shifttime')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('check-In')
                    ->required(),
                Forms\Components\TextInput::make('check-out')
                    ->required(),
                Forms\Components\TextInput::make('duration')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('date jour')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                BadgeColumn::make('nom_employe')->icon('heroicon-s-user')->searchable()->weight('semibold')->size('lg')->color('warning'),
                BadgeColumn::make('nom_departement')->icon('heroicon-s-library')->searchable()->weight('semibold')->size('lg'),
                Tables\Columns\TextColumn::make('gender')->label('Sexe')->weight('semibold')->size('lg'),
                Tables\Columns\TextColumn::make('date debut de thavaille')->label('debut de travaille')->weight('semibold')->size('lg')
                    ->date(),
                BadgeColumn::make('device')->label('Pointeuse')->icon('heroicon-s-device-tablet')->searchable()->weight('semibold')->size('lg')->color('danger'),
                BadgeColumn::make('shifttime')->label('Emploi du temps')->weight('semibold')->size('lg')->color('warning'),
                BadgeColumn::make('check-In')->label('Pointage '."d'entre")->weight('semibold')->size('lg')->color('success'),
                BadgeColumn::make('check-out')->label('Pointage de sortie')->weight('semibold')->size('lg')->color('success'),
                BadgeColumn::make('duration')->label('Durre de travaille')->weight('semibold')->size('lg')->color('success'),
                BadgeColumn::make('late_in')->label('Retardé par')->weight('semibold')->size('lg')->color('danger'),
                BadgeColumn::make('late_out')->label('Sort en retard par')->weight('semibold')->size('lg')->color('danger'),
                BadgeColumn::make('early_in')->label('Entré tôt par')->weight('semibold')->size('lg')->color('danger'),
                BadgeColumn::make('early_out')->label('Sortit tôt par')->weight('semibold')->size('lg')->color('danger'),
                Tables\Columns\TextColumn::make('date jour')->weight('semibold')->size('lg')
                    ->date(),
            ])
            ->headerActions([
                
                FilamentExportHeaderAction::make('export')
                
            ])
            ->filters([
               
            ])
            ->actions([
                
                //Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
               
               
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
            'index' => Pages\ListNewtables::route('/'),
            //'create' => Pages\CreateNewtable::route('/create'),
            //'edit' => Pages\EditNewtable::route('/{record}/edit'),
        ];
    } 
    protected function getTableHeaderActions(): array
{
   
        
    
}   
}
