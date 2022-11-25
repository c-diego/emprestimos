<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\Item;
use App\Models\Sector;
use App\Models\User;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
  public function items()
  {
    return view('manager.items', ['items' => Item::all()]);
  }

  public function delete(Item $item)
  {
    $item->delete();
    return redirect()->intended(route('manager.items'));
  }

  public function create()
  {
    return view('manager.create');
  }

  public function save(ItemRequest $itemRequest)
  {
    $validated = $itemRequest->validated();
    if (!empty($validated['image'])) {
      $file = $validated['image'];
      $path = $file->store('images', 'public');
      $validated['image'] = $path;
    }
    $item = new Item();
    $item->fill($validated);
    $item->is_available = true;
    $item->sector()->associate(Sector::find(1));
    $item->save();
    return redirect()->intended(route('manager.items'));
  }

  public function edit(Item $item)
  {
    return view('manager.edit', ['item' => $item]);
  }

  public function update(Item $item, ItemRequest $itemRequest)
  {
    $validated = $itemRequest->validated();
    if (!empty($validated['image'])) {
      $file = $validated['image'];
      $path = $file->store('images', 'public');
      $validated['image'] = $path;
    }
    $item->fill($validated);
    $item->save();
    return redirect()->intended(route('manager.items'));
  }
}
