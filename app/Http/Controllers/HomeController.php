<?php

namespace App\Http\Controllers;

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

  public function request(Request $request) {
    return redirect('/');
  }

}
