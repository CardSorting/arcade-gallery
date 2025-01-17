<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreListing extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_id',
        'name',
        'description',
        'icon',
        'screenshots',
        'category',
        'price',
        'distribution',
        'is_featured',
        'published_at'
    ];

    protected $casts = [
        'screenshots' => 'array',
        'published_at' => 'datetime',
        'is_featured' => 'boolean'
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
