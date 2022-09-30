<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DisabilityResource\Pages;
use App\Filament\Resources\DisabilityResource\RelationManagers;
use App\Models\Disability;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DisabilityResource extends Resource
{
    protected static ?string $model = Disability::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()->columnSpan(2),
                Forms\Components\Textarea::make('description')
                    ->required()->columnSpan(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('job_count')->label('Total Job')->counts('job'),
                TextColumn::make('created_at')->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListDisabilities::route('/'),
            'create' => Pages\CreateDisability::route('/create'),
            'edit' => Pages\EditDisability::route('/{record}/edit'),
        ];
    }
}
