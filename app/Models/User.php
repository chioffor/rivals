<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function team()
    {
        return $this->hasOne(Team::class);
    }

    public function rivals()
    {
        return $this->belongsToMany(User::class, 'user_rival', 'user_id', 'rival_id')->withPivot('status');
    }

    public function sentRequests()
    {
        return $this->belongsToMany(User::class, 'user_rival', 'user_id', 'rival_id')
                        ->withPivot('status')
                        ->wherePivot('status', 'sent');
    }

    public function pendingRequests()
    {
        return $this->belongsToMany(User::class, 'user_rival', 'user_id', 'rival_id')
                        ->withPivot('status')
                        ->wherePivot('status', 'pending');
    }

    public function connects()
    {
        return $this->belongsToMany(User::class, 'user_rival', 'user_id', 'rival_id')
                        ->withPivot('status')
                        ->wherePivot('status', 'connected');
    }

    public function isArival($id)
    {
        return $this->belongsToMany(User::class, 'user_rival', 'user_id', 'rival_id')
                        ->withTimestamps()
                        ->withPivot('status')
                        ->wherePivot('user_id', $id);
    }

    // public function sentRequest()
    // {
    //     return $this->belongsToMany(User::class, 'user_rival', 'user_id', 'rival_id')->withPivot('status', 'sent');
    // }
    
    // public function pendingRequest()
    // {
    //     return $this->belongsToMany(User::class, 'user_rival', 'user_id', 'rival_id')->withPivot('status', 'pending');
    // }

    
}
