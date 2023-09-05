<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $guarded =[];

    // ORM - Specifies Many-to-Many relation between Role and User
    // public function users(){
    //     return $this->belongsToMany(User::class);
    // } 

    // ORM - Specifies Many-to-Many relation between Role and User
    // Populate pivot table(Many to Many) with timestamp
    public function users(){
        return $this->belongsToMany(User::class)->withTimestamps();
    } 
}

