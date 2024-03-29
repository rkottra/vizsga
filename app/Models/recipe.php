<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recipe extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    protected $fillable = ['recipeName'];

    protected $casts = [
        'dateAdded' => 'datetime:Y-m-d',
    ];

}
