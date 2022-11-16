<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    'has_ended'
  ];

  public static function saveLoan(Loan $loan, Item $item)
  {
    // FAT models, Thin controllers; Toda lógica de banco de dados deverá estar nos modelos;
    // Onde ficará as regras de negócio?
    if (!$item->is_available) {
      return false;
    }
    dd($loan->start_date);
  }
}
