<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category',
        'location',
        'location_coordinate',
        'price_adults',
        'price_kids',
        'description',
        'lessons',
        'lessons_details',
        'water',
        'wifi',
        'parking',
        'fire',
        'shower',
        'toilets'

    ];
}
