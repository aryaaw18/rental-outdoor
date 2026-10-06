<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Equipment extends Model
{
    protected $table = 'equipment';

    protected $fillable = [
        'name',
        'category_id',
        'rental_price',
        'stock',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}