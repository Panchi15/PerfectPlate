<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function menu()
    {
        $items = Item::all();
        return view('customer.menu', ['items' => $items]);
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
        return view('customer.menu', compact('items', 'search', 'filter'));

    }
}
