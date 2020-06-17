<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
  protected $fillable = [
    'entity',
    'object',
    'post',
    'surname',
    'name',
    'patronymic',
    'birthday',
    'citizenship',
    'placeBirth',
    'address',
    'registration',
    'homePhone',
    'phone',
    'passport',
    'familyStatus',
    'additionalEducation',
    'sport',
    'computer',
    'army',
    'badHabbits',
    'goodHabbits',
    'irregular',
  ];

  protected $casts = [
    'irregular' => 'boolean'
  ];

  public function relatives()
  {
    return $this->hasMany(Relative::class);
  }

  public function educations()
  {
    return $this->hasMany(Education::class);
  }

  public function works()
  {
    return $this->hasMany(Work::class);
  }
}
