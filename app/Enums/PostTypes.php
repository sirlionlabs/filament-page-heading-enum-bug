<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum PostTypes: string implements HasLabel, Htmlable
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

    /**
     * Adding in Htmlable contract resovles the above exception. However, the breadcrumbs 
     * and the page Heading is not consistent. 
     * 
     * @see /admin/posts/1/edit
     * 
     * -- Page Heading: Edit system
     * -- Breadcrumbgs: System Update...this HTMLABLE Enum...
     * 
     * It is expected that page heading is the same as what's shown in the breadcrumb.
     * Page heading is currently showing the enum value, not any label.
     * It is expected that both areas should utilize the getLabel() instead of htmlable.
     * 
     */

    public function toHtml(): string
    {
        return $this->getLabel() .'...this HTMLABLE Enum...';
    }

}
