<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Author extends Model
{
    protected $fillable = [
        'name',
        'user_id',
    ];

    // one author belong to one user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    //author write many articles
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }

    //any user can comment on author
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }



}
