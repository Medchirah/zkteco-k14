<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\employe;
use App\Models\shifttime;
use App\Models\Tabletime;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Builder;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Resources\TabletimeResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TabletimeResource\RelationManagers;

class TabletimeResource extends Resource
{
    protected static ?string $model = Tabletime::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'shifttime management';
   // protected static ?string $recordTitleAttribute = 'tabletimes';
   protected static ?string $modelLabel = 'employe<=emploi du temps';

    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                Select::make('employe_id')
                ->relationship('employe', 'nom')
                ->options(employe::all()->pluck('nom', 'id'))
                ->searchable(),
                Select::make('shifttime_id')
                ->relationship('shifttime', 'name')
                ->options(shifttime::all()->pluck('name', 'id'))
                ->searchable(),
                DatePicker::make('date_debut')
                    ->required()
                    ,
                Forms\Components\DatePicker::make('date_fin')
                    ->required()
                    ,     ])
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
              //  Tables\Columns\TextColumn::make('id'),
                BadgeColumn::make('employe.nom')->sortable()->searchable()->icon('heroicon-s-user')->color('warning'),
                BadgeColumn::make('shifttime.name')->label('Emploi du temps')->sortable()->searchable()->color('warning'),
                Tables\Columns\TextColumn::make('date_debut')
                ->sortable()
                ->date(),
                Tables\Columns\TextColumn::make('date_fin')
                ->sortable()
                ->date(),
            ])
            ->filters([
                SelectFilter::make('tous les  employes:')->relationship('employe', 'nom')
                ->label('  Employes'),
                SelectFilter::make('tous les  shifttimes:')->relationship('shifttime', 'name')
                ->label(' Emploi du temps: ')
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListTabletimes::route('/'),
            'create' => Pages\CreateTabletime::route('/create'),
            'edit' => Pages\EditTabletime::route('/{record}/edit'),
        ];
    }    
    public static function getGlobalSearchResultTitle(Model $record):string
{
    return 'search result: '.$record->employe_id;
}
}
