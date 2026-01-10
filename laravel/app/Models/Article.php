<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Article extends Model
{
    protected $fillable = [
        'name',
        'author_id',
    ];

    //article is written by an author
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    //article can have multiple audiences
    public function audiences(): BelongsToMany
    {
        return $this->belongsToMany(Audience::class);
    }

    //any user can comment on article
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
