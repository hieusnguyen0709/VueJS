<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;

class UserController extends Controller
{
    public function show($id)
    {
        return User::findOrFail($id);
    }

    public function index()
    {
        return User::
            join('departments', 'users.department_id', '=', 'departments.id')
            ->join('users_status', 'users.status_id', '=', 'users_status.id')
            ->select(
                'users.*',
                'departments.name as department',
                'users_status.name as status'
            )
            ->get();
    }

    public function create()
    {
        $users_status = DB::table('users_status')->select('id as value', 'name as label')->get();
        $departments = DB::table('departments')->select('id as value', 'name as label')->get();

        return response()->json([
            'users_status' => $users_status,
            'departments' => $departments
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'status_id' => 'required',
            'username' => 'required',
            'name' => 'required',
            'email' => 'required',
            'department_id' => 'required',
            'password' => 'required|confirmed',
        ], [
            'status_id.required' => 'Please fill out this field.',
            'username.required' => 'Please fill out this field.',
            'name.required' => 'Please fill out this field.',
            'email.required' => 'Please fill out this field.',
            'department_id.required' => 'Please fill out this field.',
            'password.required' => 'Please fill out this field.',
            'password.confirmed' => 'The password and Password confirmation must match.',
        ]);
    }
}
