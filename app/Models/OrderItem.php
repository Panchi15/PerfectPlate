<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'OrderID',
        'ItemID',
        'Quantity',
        'Customization',
        'Price',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'OrderID');
    }
}
