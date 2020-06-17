<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{

  protected $fillable = [
    'start', 'end', 'title', 'speciality'
  ];

  protected $table = "educations";

  public function employee()
  {
    return $this->belongsTo(Employee::class);
  }
}
