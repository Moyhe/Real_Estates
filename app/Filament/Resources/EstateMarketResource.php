<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EstateMarketResource\Pages;
use App\Filament\Resources\EstateMarketResource\RelationManagers;
use App\Models\EstateMarket;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EstateMarketResource extends Resource
{
    protected static ?string $model = EstateMarket::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Admins';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make([
                    Grid::make(3)->schema([
                        Forms\Components\TextInput::make('number_of_deals')
                            ->required()
                            ->numeric(),
                        Forms\Components\TextInput::make('deal_value')
                            ->required()
                            ->numeric(),
                        Forms\Components\TextInput::make('circulating_space')
                            ->required()
                            ->numeric(),
                    ]),
                    Grid::make(3)
                        ->schema([
                            Forms\Components\TextInput::make('max_price')
                                ->required()
                                ->numeric(),
                            Forms\Components\TextInput::make('average_price')
                                ->required()
                                ->numeric(),
                            Forms\Components\TextInput::make('min_price')
                                ->required()
                                ->numeric(),
                        ]),

                    Grid::make(2)
                        ->schema([
                            Forms\Components\TextInput::make('best_order')
                                ->required()
                                ->numeric(),
                            Forms\Components\TextInput::make('best_supply')
                                ->required()
                                ->numeric(),
                        ]),
                ])
            ])->columns(12);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('number_of_deals')
                    ->numeric()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('deal_value')
                    ->numeric()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('circulating_space')
                    ->numeric()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('max_price')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('average_price')
                    ->numeric()
                    ->sortable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('min_price')
                    ->numeric()
                    ->sortable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('best_order')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('best_supply')
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
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListEstateMarkets::route('/'),
            'create' => Pages\CreateEstateMarket::route('/create'),
            'view' => Pages\ViewEstateMarket::route('/{record}'),
            'edit' => Pages\EditEstateMarket::route('/{record}/edit'),
        ];
    }
}
