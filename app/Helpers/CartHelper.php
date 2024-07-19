<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Session;

class CartHelper
{
    public static function itemCount()
    {
       $userid = auth()->user()->id;
        $count = \App\Models\Cart::where('UserID', $userid)->count();


        return $count;
    }
}
