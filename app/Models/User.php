<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function tweets () {
        return $this->hasMany(Tweet::class, 'author_id')->orderByDesc('created_at');
    }

    public function tweetsLiked () {
        return $this->belongsToMany(Tweet::class, 'likes', 'user_id', 'tweet_id')->orderByDesc('created_at');
    }

    public function followers () {
        return $this->belongsToMany(User::class, 'follows', 'followed_id', 'follower_id');
    }

    public function follows () {
        return $this->belongsToMany(User::class, 'follows', 'follower_id', 'followed_id');
    }

    public function getFeed () {
        return Tweet::whereNull('parent_id')->whereIn('author_id', function($query)  {

            $query->select('followed_id')
                ->from('follows')
                ->where('follower_id', $this->id);

        })->orWhere('author_id', $this->id)->whereNull('parent_id')->latest()->with('author')->with('likers')->with('responses')->paginate(10);
    }

    public function getLast() {
        return Tweet::where('author_id', $this->id)->latest()->with('author')->with('likers')->with('responses')->first();
    }
}
