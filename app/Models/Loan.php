<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Loan extends Model
{
  use HasFactory;

  protected $fillable = [
    'start_date',
    'end_date',
    'has_ended',
    'amount',
    'situation'
  ];

  public static function saveLoan(Loan $loan, Item $item)
  {

    if (!$item->is_available) {
      return false;
    }
    $loan->has_ended = false;
    $loan->situation = 'Pendente';
    $loan->item()->associate($item);
    $loan->user()->associate(Auth::user());
    $loan->save();
  }

  public function item()
  {
    return $this->belongsTo(Item::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }

}
