<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('type')
                    ->required()
                    ->default('system'),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
