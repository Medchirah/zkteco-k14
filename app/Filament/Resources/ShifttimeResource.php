<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Shifttime;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ShifttimeResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ShifttimeResource\RelationManagers;

class ShifttimeResource extends Resource
{
    protected static ?string $model = Shifttime::class;

    protected static ?string $navigationIcon = 'heroicon-o-document';
    protected static ?string $navigationGroup = 'shifttime management';
   // protected static ?string $recordTitleAttribute = 'shifttimes';
   protected static ?string $modelLabel = 'emplois du temps';
    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TimePicker::make('date_entre')
                    ->required(),
                Forms\Components\TimePicker::make('date_sortie')
                    ->required(),
                Forms\Components\TimePicker::make('p_entre')
                    ->required(),
                Forms\Components\TimePicker::make('p_sortie')
                    ->required(),
                Forms\Components\TimePicker::make('debut_entre')
                    ->required(),
                Forms\Components\TimePicker::make('fin_entre')
                    ->required(),
                Forms\Components\TimePicker::make('debut_sortie')
                    ->required(),
                Forms\Components\TimePicker::make('fin_sortie')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                
               BadgeColumn::make('name')->label('Nom '."d'emploi du temps")->icon('heroicon-s-calendar')
                 ->colors([
                         'primary',
                         'secondary' => 'draft',
                         'warning' => 'reviewing',
                         'success' => 'published',
                         'danger' => 'rejected',
    ])->searchable(),
                 BadgeColumn::make('date_entre'),
                 BadgeColumn::make('date_sortie'),
                 BadgeColumn::make('p_entre'),
                 BadgeColumn::make('p_sortie'),
                 BadgeColumn::make('debut_entre'),
                 BadgeColumn::make('fin_entre'),
                 BadgeColumn::make('debut_sortie'),
                 BadgeColumn::make('fin_sortie'),
                //Tables\Columns\TextColumn::make('created_at')
                  //  ->dateTime(),
                //Tables\Columns\TextColumn::make('updated_at')
                  //  ->dateTime(),
            ])
            ->filters([
                SelectFilter::make('shifttime_name')
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageShifttimes::route('/'),
        ];
    }   
     
}
