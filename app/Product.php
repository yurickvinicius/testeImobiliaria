<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'code', 'title', 'observation', 'nameFile', 'price', 'category'
    ];
}
