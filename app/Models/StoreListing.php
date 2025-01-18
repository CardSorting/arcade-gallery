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
        'icon',
        'screenshots',
        'features',
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
        'published_at' => 'datetime',
        'is_featured' => 'boolean'
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function getAverageRatingAttribute(): float
    {
        return $this->reviews()->avg('rating') ?? 0;
    }

    public function getReviewsCountAttribute(): int
    {
        return $this->reviews()->count();
    }
}
