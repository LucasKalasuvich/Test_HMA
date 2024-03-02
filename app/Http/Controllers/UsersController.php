<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{

    public function viewDashboard()
    {
        $users = User::count();
        $users_status = User::where('status', 'Active')->get()->count();
        return view('dashboard', compact('users', 'users_status'));
    }

    public function index()
    {
        $users = User::orderBy('id', 'DESC')->get();
        return view('master', [
            'users' => $users
        ]);
    }
    
    public function view()
    {
        return view('TambahUsers');
    }
    
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
            'email' => 'required|email',
            'status' => 'required'
        ]);

        User::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'name' => $request->name,
                'password' => Hash::make($request->password),
                'email' => $request->email,
                'status' => $request->status
            ]
        );

        if ($request->id) {
            return redirect()->route('master')->with('success', 'Success Update Users!');
        } else {
            return redirect()->route('master')->with('success', 'Success Update Users!');
        }
    }

    public function edit($id)
    {
        $users = User::find($id);
        return view('editUsers', compact('users'));
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->back()->with('Success', 'Success Delete Data Users!');
    }
}
