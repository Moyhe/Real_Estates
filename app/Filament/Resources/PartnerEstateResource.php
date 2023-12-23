<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PartnerEstateResource\Pages;
use App\Filament\Resources\PartnerEstateResource\RelationManagers;
use App\Models\Category;
use App\Models\PartnerEstate;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PartnerEstateResource extends Resource
{
    protected static ?string $model = PartnerEstate::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Marketers';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make([
                    Forms\Components\Select::make('user_id')
                        ->relationship(
                            name: 'user',
                            titleAttribute: 'name',
                            modifyQueryUsing: fn (Builder $query) => $query->where(
                                [
                                    ['id', auth()->user()->id]
                                ]
                            )

                        )
                        ->required(),
                    Forms\Components\Select::make('category_id')
                        ->required()
                        ->label('Estate Type')
                        ->preload()
                        ->searchable()
                        ->relationship('category', 'name'),
                    Forms\Components\Select::make('orderType_id')
                        ->relationship('orderType', 'name')
                        ->label('Order Type')
                        ->preload()
                        ->searchable()
                        ->required(),

                    Grid::make(2)
                        ->schema([
                            Forms\Components\TextInput::make('street')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('city')
                                ->required()
                                ->maxLength(255),
                        ]),

                    Grid::make(2)
                        ->schema([
                            Forms\Components\TextInput::make('area_from')
                                ->required()
                                ->minValue(0)
                                ->maxValue(99999)
                                ->numeric(),
                            Forms\Components\TextInput::make('area_to')
                                ->required()
                                ->minValue(0)
                                ->maxValue(99999)
                                ->numeric(),
                        ]),

                    Grid::make(2)
                        ->schema([
                            Forms\Components\TextInput::make('price_from')
                                ->required()
                                ->minValue(0)
                                ->maxValue(99999)
                                ->numeric(),
                            Forms\Components\TextInput::make('price_to')
                                ->required()
                                ->minValue(0)
                                ->maxValue(99999)
                                ->numeric(),
                        ]),

                    Forms\Components\RichEditor::make('description')
                        ->required()
                        ->columnSpanFull(),
                ])->columnSpan(8),

                Section::make([
                    Forms\Components\FileUpload::make('thumbnails'),
                ])->columnSpan(4)

            ])->columns(12);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('order_type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('street')
                    ->searchable(),
                Tables\Columns\TextColumn::make('city')
                    ->searchable(),
                Tables\Columns\TextColumn::make('estate_type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('area_from')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('area_to')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price_from')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price_to')
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
            'index' => Pages\ListPartnerEstates::route('/'),
            'create' => Pages\CreatePartnerEstate::route('/create'),
            'view' => Pages\ViewPartnerEstate::route('/{record}'),
            'edit' => Pages\EditPartnerEstate::route('/{record}/edit'),
        ];
    }
}
