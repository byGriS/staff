<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{

  protected $fillable = [
    'start', 'end', 'title', 'post', 'address', 'dismissal'
  ];

  public function employee()
  {
    return $this->belongsTo(Employee::class);
  }
}
