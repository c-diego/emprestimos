<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{

  public function index()
  {

    if (Auth::user()->is_manager)
      return view('manager.items', ['items' => Item::where('sector_id', Auth::user()->sector->id)->get()]);

    return redirect()->intended(route('home'));

  }


  public function create()
  {
    return view('manager.create');
  }


  public function store(ItemRequest $itemRequest)
  {
    $validated = $itemRequest->validated();
    if (!empty($validated['image'])) {
      $file = $validated['image'];
      $path = $file->store('images', 'public');
      $validated['image'] = $path;
    } else {
      $validated['image'] = 'images/default.jpg';
    }
    $item = new Item();
    $item->fill($validated);
    $item->is_available = true;
    $item->sector()->associate(Auth::user()->sector);
    $item->save();
    return redirect()->intended(route('manager.items'));
  }

  public function edit(Item $item)
  {
    return view('manager.edit', ['item' => $item]);
  }


  public function update(ItemRequest $itemRequest, Item $item)
  {
    $validated = $itemRequest->validated();
    if (!empty($validated['image'])) {
      $file = $validated['image'];
      $path = $file->store('images', 'public');
      $validated['image'] = $path;
    }
    $item->is_available = true;
    $item->fill($validated);
    $item->save();
    return redirect()->intended(route('manager.items'));
  }


  public function destroy(Item $item)
  {
    if ($item->image != null && $item->image != 'images/default.jpg') {
      Storage::delete('public/'. $item->image);
    }
    $item->delete();
    return redirect()->intended(route('manager.items'));
  }
}
