<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Repositories\EmployeeRepository;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
  public function show(EmployeeRepository $employeeRepository, $id)
  {
    $employee = $employeeRepository->getById($id);
    return view("employeeView")->with('employee', $employee);
  }

  public function edit(EmployeeRepository $employeeRepository, $id)
  {
    $employee = $employeeRepository->getById($id);
    return view("employeeForm")->with('employee', $employee);
  }

  public function create()
  {
    return view("employeeForm");
  }
}
