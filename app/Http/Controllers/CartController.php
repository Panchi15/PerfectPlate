<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $uerID = auth()->user()->id;


        $carts = Cart::where('UserID', $uerID)->get();
        $items = Item::all();

        $totel = 0;
        foreach ($carts as $cart) {
            $totel += $cart->TotalPrice;
        }
        session()->put('total', $totel);

        return view('customer.cart', compact('carts','items','totel'));
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'Quantity' => ['required'],
            'ItemID' => ['required'],
        ]);
        if ($data['Quantity'] > Item::find($data['ItemID'])->stock) {
            return redirect()->route('customer.menu');
        }
        if ($data['Quantity'] < 1) {
            return redirect()->route('customer.menu');
        }

        $unitPrice = Item::find($data['ItemID'])->price;
        $TotalPrice = $unitPrice * $data['Quantity'];
        $uerID = auth()->user()->id;
        $data['TotalPrice'] = $TotalPrice;
        $data['UserID'] = $uerID;

        $newstock = Item::find($data['ItemID'])->stock - $data['Quantity'];

        Item::find($data['ItemID'])->update(['stock' => $newstock]);

        Cart::create([
            'Quantity' => $data['Quantity'],
            'TotalPrice' => $data['TotalPrice'],
            'UserID' => $data['UserID'],
            'ItemID' => $data['ItemID'],
            'customization' => $request->customization,
        ]);
        $usercount = Cart::where('UserID', $uerID)->count();
        session()->put('cart', $usercount);


        return redirect()->route('customer.menu');

    }

    public function show(Cart $cart)
    {
        return $cart;
    }

    public function update(Request $request, Cart $cart)
    {
        $data = $request->validate([
            'ItemName' => ['required'],
            'Quantity' => ['required'],
            'UnitPrice' => ['required'],
            'TotalPrice' => ['required'],
            'UserID' => ['required', 'integer'],
            'ItemID' => ['required', 'integer'],
        ]);

        $cart->update($data);

        return $cart;
    }

    public function destroy(Cart $cart)
    {
        //add back to stock
        $newstock = Item::find($cart->ItemID)->stock + $cart->Quantity;
        Item::find($cart->ItemID)->update(['stock' => $newstock]);

        $cart->delete();

        return redirect()->route('customer.cart');
    }
}
