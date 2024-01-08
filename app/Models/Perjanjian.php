<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Perjanjian extends Model
{
  use HasFactory;
  protected $guarded = ['id'];

  public function pasien()
  {
    return $this->belongsTo(User::class);
  }
}
