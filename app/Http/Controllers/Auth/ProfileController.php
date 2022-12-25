<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function checkProfile(){
        $user = Auth::user();
        return view('profile.profile', compact('user'));
    }

    public function update(){
        $user = Auth::user();
        return view('profile.editUser', compact('user'));
    }

    public function updateProfile(ProfileRequest $request){
        $validated = $request->validated();

        $new_profile = User::findOrFail(Auth::user()->id)->update([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'address' => $validated['address'],
            'phone_number' => $validated['phone_number'],
        ]);

        return redirect()->route('profile')->with('success', 'Profile Successfully Updated!');
    }

    public function updatePass(){
        return view('profile.editPassword');
    }

    public function updatePassword(PasswordRequest $request){
        $validated = $request->validated();

        if(!Hash::check($validated['current_password'], Auth::user()->password)){
            return back()->with('fail', "Current Password is Invalid");
        }

        if(strcmp($validated['current_password'], $validated['new_password']) == 0){
            return back()->with('fail', "New Password Must be Different from the Current One");
        }

        $user =  User::find(Auth::user()->id);
        $user->password =  Hash::make($validated['new_password']);
        $user->save();
        return back()->with('success', "Password Changed Successfully");
    }
}
