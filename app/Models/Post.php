<?php

namespace App\Models;

use App\Enums\PostTypes;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'type', 'is_active',
    ];

    protected function casts(): array
    {
        return [
            'type' => PostTypes::class,
            'is_active' => 'boolean',
        ];
    }
}
