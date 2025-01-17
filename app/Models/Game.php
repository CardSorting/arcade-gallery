<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'git_repository_id',
        'status',
        'store_title',
        'store_description',
        'store_icon',
        'store_screenshots',
        'store_category',
        'store_price',
        'store_featured',
        'store_published_at'
    ];

    protected $casts = [
        'store_screenshots' => 'array',
        'store_featured' => 'boolean',
        'store_published_at' => 'datetime'
    ];

    public static $storeValidationRules = [
        'store_title' => 'required|string|max:255',
        'store_description' => 'required|string|max:1000',
        'store_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        'store_screenshots' => 'nullable|array|max:5',
        'store_screenshots.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        'store_category' => 'required|string|max:255',
        'store_price' => 'nullable|numeric|min:0',
        'store_featured' => 'sometimes|boolean',
        'store_published_at' => 'nullable|date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function storeListing()
    {
        return $this->hasOne(StoreListing::class);
    }

    public function gitRepository()
    {
        return $this->belongsTo(GitRepository::class);
    }

    public function getGitRepositoryUrlAttribute()
    {
        return $this->gitRepository->url;
    }
}
