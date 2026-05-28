<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MovimentacaoResource\Pages;
use App\Filament\Resources\MovimentacaoResource\RelationManagers;
use App\Models\Movimentacao;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MovimentacaoResource extends Resource
{
    protected static ?string $model = Movimentacao::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('produto_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('tipo_movimentacao')
                    ->required(),
                Forms\Components\TextInput::make('quantidade')
                    ->required()
                    ->numeric(),
                Forms\Components\DatePicker::make('data_movimentacao')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('produto_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tipo_movimentacao'),
                Tables\Columns\TextColumn::make('quantidade')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('data_movimentacao')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMovimentacaos::route('/'),
            'create' => Pages\CreateMovimentacao::route('/create'),
            'edit' => Pages\EditMovimentacao::route('/{record}/edit'),
        ];
    }
}
