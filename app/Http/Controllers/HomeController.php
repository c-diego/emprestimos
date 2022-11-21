<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReserveItemRequest;
use App\Models\Item;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

  public function index()
  {
    return view('home', ['items' => Item::paginate(10)]);
  }

  public function profile()
  {
    return view('profile', ['loans' => User::find(1)->loans]);
  }


  public function search(Request $request)
  {
    return view('home', ['items' => Item::where('title', 'like', '%' . $request->input('term') . '%')->paginate(10)]);
  }

  public function showItem(Item $item)
  {
    return view('item', ['item' => $item]);
  }

  public function reserveItem(Item $item, ReserveItemRequest $reserveItemRequest)
  {
    $validated = $reserveItemRequest->validated();
    $loan = new Loan();
    $loan->fill($validated);
    $loan->has_ended = false;
    Loan::saveLoan($loan, $item);
    return redirect('/');
  }

}
