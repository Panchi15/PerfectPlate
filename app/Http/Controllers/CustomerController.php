<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\LoginController;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function menu()
    {
        $items = Item::all();
        return view('customer.menu', ['items' => $items])->with('currentview', 'menu');
    }

    public function search(Request $request)
    {
        $filter = $request->input('dietaryFilter');
        $search = $request->input('search');

        // Initialize the query builder
        $query = Item::query();

        // Apply the dietary filter if not 'all'
        if ($filter && $filter !== 'all') {
            $query->where('dietary', $filter);
        }

        // Apply the search filter
        if ($search) {
            $query->where('itemName', 'like', '%' . $search . '%');
        }

        // Get the filtered items
        $items = $query->get();

        // Return the view with the filtered items and search term
        return view('customer.menu', compact('items', 'search', 'filter'))->with('currentview', 'menu');

    }

    public function profile()
    {
        $userid = auth()->user()->id;
        $user = User::where('id', $userid)->first();

        return view('customer.profile', compact('user'))->with('currentview', 'profile');
    }

    public function orders()
    {
        $userid = auth()->user()->id;
        $orders = Order::where('userId', $userid)->orderBy('created_at', 'desc')->get();

        return view('customer.orders',['orders'=> $orders] )->with('currentview', 'profile');
    }

    public function update(Request $request)
    {
       $password = $request->password;

       if ($password == null){
              $request->validate([
                'fname' => 'required|string',
                'lname' => 'required|string',
                'email' => 'required|email',
                'allergies' => 'required|string',
                'dob' => 'required|date',
              ]);

              $user = User::find(auth()->user()->id);
              $user->fname = $request->fname;
              $user->lname = $request->lname;
              $user->email = $request->email;
              $user->allergies = $request->allergies;
              $user->dob = $request->dob;
              $user->role = $request->role;
              $user->dietaryPreference = $request->dietaryPreference;
              $user->save();

           return redirect()->route('customer.profile', ['user' => $user])->with('currentview', 'profile');
         } else {
              $request->validate([
                'fname' => 'required|string',
                'lname' => 'required|string',
                'email' => 'required|email',
                'allergies' => 'required|string',
                'dob' => 'required|date',
                'password' => 'required|string',
              ]);

              $user = User::find(auth()->user()->id);
              $user->fname = $request->fname;
              $user->lname = $request->lname;
              $user->email = $request->email;
              $user->allergies = $request->allergies;
              $user->dob = $request->dob;
              $user->password = bcrypt($request->password);
              $user->role = $request->role;
              $user->dietaryPreference = $request->dietaryPreference;
              $user->save();

              //logout
                Auth::logout();
                return redirect()->route('welcome');
       }


    }

    public function orderitems(Order $order)
    {
        $orderid = $order->id;

        $orderitems = OrderItem::where('orderId', $orderid)->get();
        $items = Item::all();

        return view('customer.orderItems', compact('orderitems', 'items'))->with('currentview', 'profile');
    }
}
