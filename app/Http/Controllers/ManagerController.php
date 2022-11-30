<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\Item;
use App\Models\Sector;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ManagerController extends Controller
{
  public function items()
  {
    if (Auth::user()->is_manager)
      return view('manager.items', ['items' => Item::all()]);
    return redirect()->intended(route('home'));
  }

  public function delete(Item $item)
  {
    if ($item->image != null)
      Storage::delete($item->image);
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
    $item->is_available = true;
    $item->fill($validated);
    $item->save();
    return redirect()->intended(route('manager.items'));
  }
  public function solicitations()
  {
    return view('manager.solicitation');
  }

}
