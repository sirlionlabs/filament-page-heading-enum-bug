<?php

namespace App\Filament\Resources\Posts\Schemas;

use App\Enums\PostTypes;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(static::bugDescription())->schema([
                    ToggleButtons::make('type')
                        ->grouped()
                        ->options(PostTypes::class)
                        ->required()
                        ->default('system'),
                ]),
                Toggle::make('is_active')
                    ->required(),
                
            ]);
    }

    protected static function bugDescription():string 
    {
        return '
            The Page heading reveals the enum value, whereas the breadcrumb 
            is correctly showing the toHtml() value on the enum. The HasLabel
            contract with ->getLabel() causes an exception.
        ';
    }
}
