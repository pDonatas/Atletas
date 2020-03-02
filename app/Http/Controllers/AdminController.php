<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    //
    public function index()
    {
        return view('admin.index');
    }

    //Users
    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function storeUser(Request $request)
    {
        $user = new User();
        $user->fill(
            [
                'name' => $request->get('name'),
                'Surname' => $request->get('Surname'),
                'email' => $request->get('email'),
                'type' => $request->get('type'),
                'password' => Hash::make($request->get('password'))
            ]
        );
        $user->save();
        return redirect()->back();
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function updateUser($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'Surname' => 'required',
            'email' => 'required'
        ]);
        $user = User::findOrFail($id);
        $user->update(
            [
                'name' => $request->get('name'),
                'Surname' => $request->get('Surname'),
                'email' => $request->get('email'),
                'type' => $request->get('type'),
            ]
        );
        if (!empty($request->get('password'))) {
            $user->update(['password' => Hash::make($request->get('password'))]);
        }
        $user->save();
        return redirect('/admin/users');
    }

    public function removeUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back();
    }
}
