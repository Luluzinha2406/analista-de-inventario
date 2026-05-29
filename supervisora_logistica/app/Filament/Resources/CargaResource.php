<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CargaResource\Pages;
use App\Filament\Resources\CargaResource\RelationManagers;
use App\Models\Carga;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CargaResource extends Resource
{
    protected static ?string $model = Carga::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('codigo_carga')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nome')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('fabricante_fornecedor')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('preco')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('quantidade')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('peso')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('altura')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('largura')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('profundidade')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('destino')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('status')
                    ->required(),
                Forms\Components\TextInput::make('id_fornecedor')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('id_supervisora')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('codigo_carga')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nome')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fabricante_fornecedor')
                    ->searchable(),
                Tables\Columns\TextColumn::make('preco')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('quantidade')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('peso')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('altura')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('largura')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('profundidade')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('destino')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('id_fornecedor')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('id_supervisora')
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
            'index' => Pages\ListCargas::route('/'),
            'create' => Pages\CreateCarga::route('/create'),
            'edit' => Pages\EditCarga::route('/{record}/edit'),
        ];
    }
}
