<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReserveItemRequest;
use App\Http\Requests\SearchRequest;
use App\Models\Item;
use App\Models\Loan;
use App\Models\Sector;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

  public function index()
  {
    return view('home', ['items' => Item::paginate(10), 'sectors' => Sector::all()]);
  }

  public function profile()
  {
    return view('profile', ['loans' => Auth::user()->loans]);
  }

  public function search(SearchRequest $searchRequest)
  {
    $validated = $searchRequest->validated();

    if ($validated['sector'] == 'todos')
      return view('home', ['items' => Item::where('title', 'like', '%' . $validated['term'] . '%')->paginate(10), 'sectors' => Sector::all()]);

    return view('home', ['items' => Item::where('title', 'like', '%' . $validated['term'] . '%')->where('sector_id', $validated['sector'])->paginate(10), 'sectors' => Sector::all()]);
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
    return redirect()->intended(route('home'));
  }

}
