<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
  use HasFactory;

  public function loans()
  {
    return $this->hasMany(Loan::class);
  }

  public function sector()
  {
    return $this->belongsTo(Sector::class);
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
