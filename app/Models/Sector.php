<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
  use HasFactory;

  protected $fillable = [
    'shortname',
    'fullname'
  ];

  public function items()
  {
    return $this->hasMany(Item::class);
  }

  public function sector() {
    return $this->belongsTo(Sector::class);
  }
}
