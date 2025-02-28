<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\FriendRequest;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'nickname',
        'bio',
        'gender'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isFriendWith(User $user)
    {
        return FriendRequest::where(function($query) use ($user) {
                $query->where(function($q) use ($user) {
                    $q->where('sender_id', $this->id)
                      ->where('receiver_id', $user->id);
                })->orWhere(function($q) use ($user) {
                    $q->where('sender_id', $user->id)
                      ->where('receiver_id', $this->id);
                });
            })
            ->where('status', 'accepted')
            ->exists();
    }

    public function friends()
    {
        return $this->belongsToMany(User::class, 'friend_requests', 'sender_id', 'receiver_id')
                    ->wherePivot('status', 'accepted');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function hasPendingFriendRequestFrom(User $user)
    {
        $request = FriendRequest::where('sender_id', $user->id)
            ->where('receiver_id', $this->id)
            ->where('status', 'pending')
            ->first();
        
        return $request !== null;
    }

    public function hasPendingFriendRequestTo(User $user)
    {
        $request = FriendRequest::where('sender_id', $this->id)
            ->where('receiver_id', $user->id)
            ->where('status', 'pending')
            ->first();
        
        return $request !== null;
    }

    public function friendRequests()
    {
        return $this->hasMany(FriendRequest::class, 'receiver_id');
    }

    public function sentFriendRequests()
    {
        return $this->hasMany(FriendRequest::class, 'sender_id');
    }
}
