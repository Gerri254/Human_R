<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CoachingServiceResource\Pages;
use App\Models\CoachingService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CoachingServiceResource extends Resource
{
    protected static ?string $model = CoachingService::class;

    protected static ?string $modelLabel = 'Service';
    
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->required(),
                Forms\Components\TextInput::make('icon_name')->placeholder('e.g., heroicon-o-star'),
                Forms\Components\Textarea::make('short_description')->columnSpanFull(),
                
                Forms\Components\Repeater::make('full_details_json')
                    ->label('Service Features')
                    ->simple(
                        Forms\Components\TextInput::make('feature')->required(),
                    )
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('short_description')->limit(50),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->modalHeading('Delete this item?')
                    ->modalDescription('Are you sure you want to delete? This action cannot be undone.')
                    ->modalWidth('md'),
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
            'index' => Pages\ListCoachingServices::route('/'),
            'create' => Pages\CreateCoachingService::route('/create'),
            'edit' => Pages\EditCoachingService::route('/{record}/edit'),
        ];
    }
}