<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Repositories\EmployeeRepository;
use Illuminate\Http\Request;

class AppController extends Controller
{
  public function index()
  {
    return view('app');
  }

  public function test(){
    dd(Employee::paginate(10));
  }
}
