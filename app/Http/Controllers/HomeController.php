<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReserveItemRequest;
use App\Models\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{

  public function index()
  {
    return view('home', ['items' => Item::paginate(10)]);
  }

  public function search(Request $request)
  {
    return view('home', ['items' => Item::where('title', 'like', '%' . $request->input('term') . '%')->paginate(10)]);
  }

  public function showItem(Item $item)
  {
    return view('item', ['item' => $item]);
  }

  public function reserveItem(Item $item, ReserveItemRequest $reserveItemRequest) {
    $validated = $reserveItemRequest->validated();
    dd($validated);
    return redirect('/');
  }

}
