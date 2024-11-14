<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'category_id', 'price', 'description', 'image_url'];

    // Define the relationship: A product belongs to a category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Define the relationship: A product can have many reviews
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // Define the relationship: A product can have many order items
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
