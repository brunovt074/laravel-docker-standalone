<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CostumerResource\Pages;
use App\Filament\Resources\CostumerResource\RelationManagers;
use App\Models\Costumer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CostumerResource extends Resource
{
    protected static ?string $model = Costumer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                ->required(),
                Forms\Components\TextInput::make('address')
                ->required(),
                Forms\Components\Select::make('level')
                ->required()
                ->options([
                    '1'=>'1',
                    '2'=>'2',
                    '3'=>'3',
                    '4'=>'4',
                    '5'=>'5',
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->sortable()
                -> searchable(),
                Tables\Columns\TextColumn::make('level')
                ->sortable(),
                Tables\Columns\TextColumn::make('address'),
                
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\DevicesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCostumers::route('/'),
            'create' => Pages\CreateCostumer::route('/create'),
            'edit' => Pages\EditCostumer::route('/{record}/edit'),
        ];
    }
}
