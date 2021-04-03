<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserAdministrationController extends Controller
{
    public function index(){
        $roles = Role::get()->where("name" ,'!=', "client");
        $users = User::with('roles')->paginate(5);
        return view('client.user-control', compact('users', 'roles'));
    }

    public function addAccount(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('gpci12345'),
            'status' => 1
        ]);
        $user->assignRole($request->role);

        return redirect()->route('user-management')->with('success', 'Data Berhasil ditambah');
    }
    
    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user-management')->with('success', 'Data Berhasil dihapus');
    }
    
    public function approveUser(){
        $user = User::whereHas("roles", function($q){ $q->where("name", "client"); })->orderBy('created_at', 'desc')->paginate(5);   
        return view('client.approve-user', compact('user'));
    }
    public function approve($id){
        $user = User::find($id);
        $user->status = 1;
        $user->save();
        
        return redirect()->route('approve-user')->with('success', 'Data Berhasil diubah');
    }
}
