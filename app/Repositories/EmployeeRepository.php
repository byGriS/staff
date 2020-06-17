<?php

namespace App\Repositories;

use App\Models\Employee;
use App\Models\Education;
use App\Models\Relative;
use App\Models\Work;
use Illuminate\Database\Eloquent\Builder;

class EmployeeRepository extends CoreRepository
{

  protected $countElemPaginate = 10;

  public function getModelClass()
  {
    return Employee::class;
  }

  public function getAll()
  {
    return $this->startConditions()->all()->toArray();
  }

  public function getWithPagination()
  {
    //Employee::all();
    return $this->startConditions()->orderBy('surname')->paginate($this->countElemPaginate)->toArray();
  }

  public function getById($id)
  {
    $employee = $this->startConditions()->find($id);
    $employee->relatives;
    $employee->educations;
    $employee->works;
    return $employee->toJson();
  }

  public function createAndUpdate($newEmployee, $id = 0)
  {
    if ($id == 0)
      $employee = new Employee();
    else
      $employee = Employee::find($id);
    $employee->fill($newEmployee);
    $employee->irregular = $newEmployee['irregular'] == "true" ? 1 : 0;


    $employee->save();
    $employee->relatives()->delete();
    if (isset($newEmployee['relatives']))
      foreach ($newEmployee['relatives'] as $empRelative) {
        $relative = new Relative();
        $relative->fill($empRelative);
        $employee->relatives()->save($relative);
      }
    $employee->educations()->delete();
    if (isset($newEmployee['educations']))
      foreach ($newEmployee['educations'] as $empEducation) {
        $education = new Education();
        $education->fill($empEducation);
        $employee->educations()->save($education);
      }
    $employee->works()->delete();
    if (isset($newEmployee['works']))
      foreach ($newEmployee['works'] as $empWork) {
        $work = new Work();
        $work->fill($empWork);
        $employee->works()->save($work);
      }
    return $employee->toJson();
  }

  public function search($filter)
  {
    $query = Employee::query();
    if (isset($filter['fio'])) {
      $query = $query->where(function ($query) use ($filter) {
        $query->where('name', 'like', '%' . $filter['fio'] . '%')
          ->orWhere('surname', 'like', '%' . $filter['fio'] . '%')
          ->orWhere('patronymic', 'like', '%' . $filter['fio'] . '%');
      });
    }
    if (isset($filter['entity'])) {
      $query = $query->where('entity', 'like', '%' . $filter['entity'] . '%');
    }
    if (isset($filter['object'])) {
      $query = $query->where('object', 'like', '%' . $filter['object'] . '%');
    }
    if (isset($filter['other'])) {
      $query = $query->where(function ($query) use ($filter) {
        $query->where('sport', 'like', '%' . $filter['other'] . '%')
          ->orWhere('computer', 'like', '%' . $filter['other'] . '%')
          ->orWhere('army', 'like', '%' . $filter['other'] . '%')
          ->orWhere('badHabbits', 'like', '%' . $filter['other'] . '%')
          ->orWhere('goodHabbits', 'like', '%' . $filter['other'] . '%');
      });
    }
    if (isset($filter['education'])) {
      $query = $query->where(function ($query) use ($filter) {
        $query->whereHas('educations', fn (Builder $localQuery) => $localQuery->where('title', 'like', '%' . $filter['education'] . '%')
          ->orWhere('speciality', 'like', '%' . $filter['education'] . '%'));
        $query->orWhere('additionalEducation', 'like', '%' . $filter['education'] . '%');
      });
    }
    if (isset($filter['address'])) {
      $query = $query->where(function ($query) use ($filter) {
        $query->where('address', 'like', '%' . $filter['address'] . '%')
          ->orWhere('registration', 'like', '%' . $filter['address'] . '%')
          ->orWhereHas('relatives', fn (Builder $localQuery) => $localQuery->where('address', 'like', '%' . $filter['address'] . '%'));
      });
    }
    if (isset($filter['work'])) {
      $query = $query->where(function ($query) use ($filter) {
        $query->where('post', 'like', '%' . $filter['work'] . '%')
          ->orWhereHas('relatives', fn (Builder $localQuery) => $localQuery->where('work', 'like', '%' . $filter['work'] . '%'))
          ->orWhereHas('works', fn (Builder $localQuery) => $localQuery->where('title', 'like', '%' . $filter['work'] . '%')
            ->orWhere('post', 'like', '%' . $filter['work'] . '%'));
      });
    }


    $employees = $query->orderBy('surname')->paginate($this->countElemPaginate)->toArray();

    return $employees;
  }
}
