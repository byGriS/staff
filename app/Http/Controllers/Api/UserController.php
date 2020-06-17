<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller\Api;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function getAll(){
    $users = User::all();
    return response()->json($users);
  }
}
