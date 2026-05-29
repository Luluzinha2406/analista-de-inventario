<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PecaResource\Pages;
use App\Filament\Resources\PecaResource\RelationManagers;
use App\Models\Peca;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PecaResource extends Resource
{
    protected static ?string $model = Peca::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('codigo')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('fabricante')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('preco')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('numero_serie')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('compatibilidade_robo')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('vida_util_horas')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('fornecedor_id')
                    ->relationship('fornecedor', 'id')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')
                    ->searchable(),
                Tables\Columns\TextColumn::make('codigo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fabricante')
                    ->searchable(),
                Tables\Columns\TextColumn::make('preco')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('numero_serie')
                    ->searchable(),
                Tables\Columns\TextColumn::make('compatibilidade_robo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('vida_util_horas')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fornecedor.id')
                    ->numeric()
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
            'index' => Pages\ListPecas::route('/'),
            'create' => Pages\CreatePeca::route('/create'),
            'edit' => Pages\EditPeca::route('/{record}/edit'),
        ];
    }
}
