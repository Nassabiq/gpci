<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index(){
        $user = User::with('roles')->find(Auth::id());
        return view('client.account',compact('user'));
    }

    public function changePassword(Request $request){
        if (Auth::check()) {
            $validator = $request->validate([
                'old_password' => 'required',
                'new_password' => ['required', 'same:new_password', 'min:6'],
                'new_password_confirmation' => 'required|same:new_password',
            ],
            [
                'old_password.required' => 'Harap isi Password lama anda',
                'new_password.required' => 'Harap isi Password baru anda',
                'new_password_confirmation.same' => 'Password anda tidak sesuai'
            ]);
            $currentPassword = Auth::User()->password;
            if(Hash::check($request->old_password, $currentPassword)){
                $user = User::find(Auth::id());
                $user->password = bcrypt($request->new_password);;
                $user->save();
                return back()->with('success', 'Your password has been updated successfully.');
            }
            else{
                return back()->with('error', 'Password anda salah');
            }
        }
    }
}
