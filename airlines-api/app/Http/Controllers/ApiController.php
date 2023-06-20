<?php

namespace App\Http\Controllers;

use App\Models\User;

class ApiController extends Controller
{
  public function getUsers()
  {
    $users = User::all();

    return response()->json($users);
  }
}
