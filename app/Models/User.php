<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
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

    // ORM - Specifies 1-to-Many relation between User and Post
    public function posts(){
        return $this->hasMany(Post::class);
    }

     // ORM - Specifies Many-to-Many relation between Role and User
    // public function roles(){
    //     return $this->belongsToMany(Role::class);
    // } 

    // ORM - Specifies Many-to-Many relation between Role and User
    // Populate pivot table(Many to Many) with timestamp
     public function roles(){
         return $this->belongsToMany(Role::class)->withTimestamps();
     } 

}
