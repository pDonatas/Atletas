<?php

namespace App\Http\Controllers;

use App\Helpers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index()
    {
        return view('users.index', [
            'users' => User::all()
        ]);
    }

    public function profile($lang, $id)
    {
        return view('users.profile', [
            'user' => Helpers::user($id)
        ]);
    }

    public function edit()
    {
        return view('users.edit')->withUser(Auth::user());
    }

    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'surname' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $name = $request->get('name');
        $surname = $request->get('surname');
        $password = $request->get('password');
        $place = $request->get('job_place');
        $training = $request->get('training');
        $email = $request->get('email');
        $video = '';
        $photo = $request->file('photo');
        if (!empty($photo)) {
            $imageName = time() . '.' . request()->photo->getClientOriginalExtension();

            $photo = '/img/avatars/' . $imageName;

            request()->photo->move(public_path('img/avatars'), $imageName);

            Auth::user()->update([
                'photo' => $photo
            ]);
        }
        if (Auth::user()->type == 1) {
            $video = $request->get('video');
        }
        Auth::user()->update([
            'name' => $name,
            'Surname' => $surname,
            'job_place' => $place,
            'job_type' => $training,
            'video' => $video,
            'email' => $email
        ]);
        if (!empty($password)) {
            Auth::user()->update([
                'password' => Hash::make($password)
            ]);
        }

        return redirect(route('user.profile', [
            app()->getLocale(), Auth::user()->id]));
    }

    public function tsearch()
    {
        return view('users.tsearch');
    }

    public function write()
    {
        if (Auth::user()->type == 1) {
            return view('news.write');
        }
        return redirect(route('home', app()->getLocale()));
    }
}
