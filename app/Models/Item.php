<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
  use HasFactory;

  public function loan()
  {
    return $this->hasMany(Loan::class);
  }

  protected $fillable = [
    'image',
    'title',
    'description',
    'is_available',
    'days_available',
    'observation',
    'amount'
  ];

}
