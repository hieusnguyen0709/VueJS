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

        User::create([
            'status_id' => $request['status_id'],
            'username' => $request['username'],
            'name' => $request['name'],
            'email' => $request['email'],
            'department_id' => $request['department_id'],
            'password' => \Hash::make($request['password']),
        ]);
    }

    public function edit($id)
    {
        $users = User::find($id);
        $users_status = DB::table('users_status')->select('id as value', 'name as label')->get();
        $departments = DB::table('departments')->select('id as value', 'name as label')->get();

        return response()->json([
            'users' => $users,
            'users_status' => $users_status,
            'departments' => $departments
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'status_id' => 'required',
            'username' => 'required',
            'name' => 'required',
            'email' => 'required',
            'department_id' => 'required',
        ], [
            'status_id.required' => 'Please fill out this field.',
            'username.required' => 'Please fill out this field.',
            'name.required' => 'Please fill out this field.',
            'email.required' => 'Please fill out this field.',
            'department_id.required' => 'Please fill out this field.',
        ]);

        User::find($id)->update([
            'status_id' => $request['status_id'],
            'username' => $request['username'],
            'name' => $request['name'],
            'email' => $request['email'],
            'department_id' => $request['department_id'],
        ]);

        if ($request['change_password'] == true) {
            $validated = $request->validate([
                'password' => 'required|confirmed',
            ], [
                'password.required' => 'Please fill out this field.',
                'password.confirmed' => 'The password and Password confirmation must match.',
            ]);
            User::find($id)->update([
                'password' => \Hash::make($request['password']),
            ]);
        }
    }
}
