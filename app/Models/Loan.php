<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Loan extends Model
{
  use HasFactory;

  public function item()
  {
    return $this->belongsTo(Item::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  protected $fillable = [
    'start_date',
    'end_date',
    'has_ended',
    'amount'
  ];

  public static function saveLoan(Loan $loan, Item $item)
  {

    if (!$item->is_available) {
      return false;
    }
    $loan->item()->associate($item);
    $loan->user()->associate(Auth::user());
    $loan->save();
  }

  public static function loans()
  {
    $loans = Auth::user()->loan();
    dd($loans);
  }

}
