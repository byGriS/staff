<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Relative extends Model
{

  protected $fillable = [
    'degree', 'fio', 'birthday', 'work', 'phone', 'address'
  ];

  public function employee()
  {
    return $this->belongsTo(Employee::class);
  }
}
