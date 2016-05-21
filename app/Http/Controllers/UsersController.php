<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller
{
   // Gets all users in the users table and returns them
	public function index()
	{
		$users = User::all();

		return $users;
	}
}
