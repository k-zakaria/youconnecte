<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{

    public function create()
    {
        return view('auth.register');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('user.login');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials don t match',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('user.login');
    }


    public function deleteMyAccount($id)
    {

        if ($id != Auth::id()) {
            abort(403);
        }

        $user = User::findOrFail($id);
        $success = $user->delete();

        if ($success) {
            return view('auth.login');
        } else {
            return back()->withError('Failed to deactivate account.');
        }
    }

    public function profile()
    {
        $user = Auth::user();

        return view('posts.profile', compact('user'));
    }

    public function subscribe(Request $request, $id)
    {
        
        $request->user()->subscriptions()->toggle([$id,$request->id]);
        return back();
    }

    public function unsubscribe(Request $request,$id)
    {
        $request->user()->subscriptions()->detach([$id,$request->id]);
        return back();
    }

    
}
