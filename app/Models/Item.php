<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Item extends Model
{
    use SoftDeletes;
    use Searchable;

    protected $fillable = [
        'itemName',
        'dietary',
        'price',
        'stock',
    ];
}
