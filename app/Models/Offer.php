<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = 'offers';

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'status',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
