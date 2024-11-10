<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {   
        $user = Auth::user();
        return view('pages.profile', compact('user'));
    }

    public function store(Request $request)
    {   
        $userID = Auth::user()->id;
        $this->validate($request, [
            'email' => ['required', 'email', Rule::unique('users')->ignore($userID)],
            'name' => 'required',
            'avatar' => 'nullable|image',
        ]);

        $user = Auth::user();
        $user->edit($request->all());
        $user->generatePassword($request->get('password'));
        $user->uploadAvatar($request->file('avatar'));

        return redirect('/profile')->with('success', 'Succsessfuly profile update');
    }
}
