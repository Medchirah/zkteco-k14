<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Departement;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DepartementResource\Pages;
use App\Filament\Resources\DepartementResource\RelationManagers;
use App\Filament\Resources\DepartementResource\Widgets\departementStatsOverview;

class DepartementResource extends Resource
{
    protected static ?string $model = Departement::class;

    protected static ?string $navigationIcon = 'heroicon-o-library';
    protected static ?string $navigationGroup = ' Employes/Departement management';
    protected static ?string $recordTitleAttribute = 'nomDept';
   

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nomDept')
                    ->required()
                    ->maxLength(255)
                    ->columnSpan(0),
            ])
            ;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
               // TextColumn::make('id')->sortable(),
                BadgeColumn::make('nomDept')->searchable()->sortable()->icon('heroicon-s-library')->weight('semibold')
                ->colors([
                    'primary',
                    'secondary' => 'reviewing',
                    'warning' => 'draft',
                    'success' => 'published',
                    'danger' => 'rejected',
]),
                TextColumn::make('created_at')
                    ->dateTime(),
                TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                SelectFilter::make('tous les departements')
                ->label('tous les departements')
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    public static function getWidgets():array{
        return[
            departementStatsOverview::class,
        ];

    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageDepartements::route('/'),
        ];
    }    
}
