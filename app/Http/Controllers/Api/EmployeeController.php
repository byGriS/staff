<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Repositories\EmployeeRepository;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(EmployeeRepository $employeeRepository)
  {
    return $employeeRepository->getWithPagination();
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(EmployeeRepository $employeeRepository, Request $request)
  {
    $newEmployee = $employeeRepository->createAndUpdate($request['employee']);
    return $newEmployee;
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(EmployeeRepository $employeeRepository, Request $request, $id)
  {
    $newEmployee = $employeeRepository->createAndUpdate($request['employee'], $id);
    return $newEmployee;
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Employee $employee)
  {
    $employee->delete();
  }

  public function search(EmployeeRepository $employeeRepository, Request $request){
    $employees = $employeeRepository->search($request->filter);
    return $employees;
  }
}
