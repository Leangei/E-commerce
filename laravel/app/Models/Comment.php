<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $fillable = [
        'content',
        'user_id',
    ];

    //user who wrote the comment
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    //commentable: Article | Author | Audience
    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }
}
