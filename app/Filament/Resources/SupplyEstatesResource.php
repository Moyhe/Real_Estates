<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SupplyEstatesResource\Pages;
use App\Filament\Resources\SupplyEstatesResource\RelationManagers;
use App\Models\SupplyEstates;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SupplyEstatesResource extends Resource
{
    protected static ?string $model = SupplyEstates::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Admins';

    public static function form(Form $form): Form
    {

        return $form
            ->schema([

                Section::make()
                    ->schema([
                        Grid::make(2)
                            ->schema([

                                Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->maxLength(255)
                                    ->live()
                                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),

                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255),
                            ]),

                        Forms\Components\Select::make('user_id')
                            ->relationship('user', 'name')
                            ->required(),
                        Forms\Components\Select::make('category_id')
                            ->required()
                            ->label('Estate Type')
                            ->preload()
                            ->searchable()
                            ->relationship('category', 'name'),
                        Forms\Components\TextInput::make('number_of_rooms')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(300),
                        Forms\Components\TextInput::make('number_of_bathroom')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(300),
                        Forms\Components\TextInput::make('area')
                            ->required()
                            ->minValue(0)
                            ->maxValue(999999)
                            ->numeric(),
                        Forms\Components\MarkdownEditor::make('description')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\RichEditor::make('address')
                            ->required()
                            ->maxLength(65535)
                            ->columnSpanFull(),


                    ])
                    ->columnSpan(8),


                Section::make()
                    ->schema([
                        Forms\Components\FileUpload::make('thumbnails')
                            ->multiple()
                            ->reorderable()
                            ->appendFiles(),
                        Forms\Components\DatePicker::make('estate_active_status')
                            ->native(false)
                            ->displayFormat('d/m/Y')
                            ->required(),
                        Forms\Components\Toggle::make('active')
                            ->required(),
                    ])
                    ->columnSpan(4),

            ])->columns(12);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('estate_type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('number_of_rooms')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('number_of_bathroom')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('area')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('estate_active_status')
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
            'index' => Pages\ListSupplyEstates::route('/'),
            'create' => Pages\CreateSupplyEstates::route('/create'),
            'view' => Pages\ViewSupplyEstates::route('/{record}'),
            'edit' => Pages\EditSupplyEstates::route('/{record}/edit'),
        ];
    }
}
