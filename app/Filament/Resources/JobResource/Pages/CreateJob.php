<?php

namespace App\Filament\Resources\JobResource\Pages;

use App\Filament\Resources\JobResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateJob extends CreateRecord
{
    protected static string $resource = JobResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['author_id'] = auth()->id();

        return $data;
    }
    
}
