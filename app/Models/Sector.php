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

  public static function items()
  {
    $loans = $user->loan();
    dd($loans);
  }
}
