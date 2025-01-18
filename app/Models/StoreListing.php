<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreListing extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_id',
        'developer',
        'name',
        'description',
        'icon',
        'screenshots',
        'features',
        'reviews',
        'category',
        'price',
        'distribution',
        'is_featured',
        'published_at',
        'size',
        'version',
        'age_rating',
        'system_requirements',
        'platforms'
    ];

    protected $casts = [
        'screenshots' => 'array',
        'features' => 'array',
        'reviews' => 'array',
        'published_at' => 'datetime',
        'is_featured' => 'boolean'
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
