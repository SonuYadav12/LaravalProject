<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'rating',
        'comment',
    ];

    // Define the relationship: A review belongs to one product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Define the relationship: A review belongs to one user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
