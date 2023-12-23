<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OwnerEstateResource\Pages;
use App\Filament\Resources\OwnerEstateResource\RelationManagers;
use App\Models\Category;
use App\Models\OwnerEstate;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Illuminate\Support\Str;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OwnerEstateResource extends Resource
{
    protected static ?string $model = OwnerEstate::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Marketers';

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
                            ->relationship('category', 'name')
                            ->preload()
                            ->searchable()
                            ->label('Estate Type')
                            ->required(),

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
                            ->maxValue(99999)
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
            'index' => Pages\ListOwnerEstates::route('/'),
            'create' => Pages\CreateOwnerEstate::route('/create'),
            'view' => Pages\ViewOwnerEstate::route('/{record}'),
            'edit' => Pages\EditOwnerEstate::route('/{record}/edit'),
        ];
    }
}
