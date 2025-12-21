<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    protected $fillable = [
        'category_id', 'name', 'slug', 'description', 'price', 'image'
        ];

        public function category(){
            return $this->belongsTo(Category::class);
            }
    /** @use HasFactory<\Database\Factories\MealFactory> */
    use HasFactory;
}
