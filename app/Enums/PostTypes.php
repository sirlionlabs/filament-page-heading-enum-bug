<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum PostTypes: string implements HasLabel
{
    case SYSTEM = 'system';
    case API = 'api';

    /**
     * This enum is cast on the Post->type
     * 
     * @see /admin/posts/1/edit
     * 
     * TypeError
     * vendor/filament/filament/src/Resources/Resource/Concerns/HasLabels.php:107
     * 
     * Filament\Resources\Resource::getRecordTitle(): 
     * Return value must be of type Illuminate\Contracts\Support\Htmlable|string|null, 
     * App\Enums\PostTypes returned
     */

    public function getLabel(): ?string
    {
        return match ($this) {
            self::SYSTEM => 'System Update',
            self::API => 'API Update',
        };
    }

}
