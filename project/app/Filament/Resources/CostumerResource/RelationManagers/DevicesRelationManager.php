<?php

namespace App\Filament\Resources\CostumerResource\RelationManagers;

use Filament\Tables\Actions\CreateAction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Device;
use Filament\Notifications\Notification;

class DevicesRelationManager extends RelationManager
{
    protected static string $relationship = 'devices';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('brand')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('model')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('model')
            ->columns([
                Tables\Columns\TextColumn::make('brand'),
                Tables\Columns\TextColumn::make('model'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                ->before(function (CreateAction $action) {
                    $record = $this->getOwnerRecord();
                    $customerId = optional($record)->getKey(); 
                    if (!$customerId) {
                        return;
                    }
                    
                    $deviceCount = Device::where('costumer_id', $customerId)->count();

                    if ($deviceCount >= 2) {
                        Notification::make()
                            ->warning()
                            ->title('No se pueden agregar más de dos dispositivos por cliente.')
                            ->body('Seleccione un cliente diferente o elimine dispositivos existentes.')
                            ->persistent()
                            ->send();

                        $action->cancel();
                    }
                }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}