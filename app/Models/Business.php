<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'hosted_by',
        'hostname',
        'category',
        'location',
        'location_coordinate',
        'price_adults',
        'price_kids',
        'phone_num',
        'photo_url',
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
