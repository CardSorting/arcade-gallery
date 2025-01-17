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
        'url'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
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
