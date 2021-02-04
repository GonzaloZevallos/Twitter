<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $null)
 * @method static create()
 */
class Tweet extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'author_id',
        'parent_id'
    ];

    public function author ()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function attachments () {
        return $this->hasMany(Attachment::class);
    }

    public function responses () {
        return $this->hasMany(Tweet::class, 'parent_id')->orderByDesc('created_at');
    }

    public function parent () {
        return $this->belongsTo(Tweet::class, 'parent_id');
    }

    public function likers () {
        return $this->belongsToMany(User::class, 'likes', 'tweet_id', 'user_id')->orderByDesc('created_at');
    }
}
