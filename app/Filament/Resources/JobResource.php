<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JobResource\Pages;
use App\Filament\Resources\JobResource\RelationManagers;
use App\Models\Job;
use Filament\Forms;
use Filament\Forms\Components\MultiSelect;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JobResource extends Resource
{
    protected static ?string $model = Job::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('company_id')
                ->label('Company')
                ->relationship('company', 'name', fn (Builder $query) => $query->where('companies.status',true)),
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('status')->options([
                    "Publish",
                    "Draft"
                    ])
                    ->required(),
                    Select::make('type')->options([
                        "Full Time",
                        "Freelancer",
                        'Part Timer',
                        "Intership"
                    ])
                    ->required(),
                    RichEditor::make('qualification')->columnSpan(2)
                    ->required(),
                   RichEditor::make('jobdesk')->columnSpan(2)
                    ->required(),
                  RichEditor::make('term')->columnSpan(2)
                    ->required(),
                    Select::make('disability')
                    ->relationship('disability','name')
                    ->multiple()
                    ->columnSpan(2),
                    Select::make('category')
                    ->multiple()
                    ->relationship('category','name')
                    ->columnSpan(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('author_id'),
                Tables\Columns\TextColumn::make('company_id'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('qualification'),
                Tables\Columns\TextColumn::make('jobdesk'),
                Tables\Columns\TextColumn::make('term'),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
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
            'index' => Pages\ListJobs::route('/'),
            'create' => Pages\CreateJob::route('/create'),
            'edit' => Pages\EditJob::route('/{record}/edit'),
        ];
    }
}
