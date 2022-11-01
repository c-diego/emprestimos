<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

  public function index()
  {
    return view('home', ['items' => Item::paginate(10)]);
  }

  public function search(Request $request)
  {
    //dd(Item::where('title', 'like', '%' . $request->input('term') . '%'));
    return view('home', ['items' => Item::where('title', 'like', '%' . $request->input('term') . '%')->paginate(10)]);
  }

  public function create()
  {
    //
  }


  public function store(Request $request)
  {
    //
  }


  public function show($id)
  {
    //
  }


  public function edit($id)
  {
    //
  }


  public function update(Request $request, $id)
  {
    //
  }


  public function destroy($id)
  {
    //
  }
}
