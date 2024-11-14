<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'role',
    ];

    // Define the relationship: A user can have many orders
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // Define the relationship: A user can have many reviews
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function contact()
    {
        return $this->hasMany(Contact::class);
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}
