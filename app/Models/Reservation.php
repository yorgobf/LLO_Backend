<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'business_id',
        'username',
        'businessname',
        'number_adults',
        'number_kids',
        'date'
    ];
}
