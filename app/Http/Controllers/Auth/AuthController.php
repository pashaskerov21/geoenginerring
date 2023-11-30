<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin-panel.auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('admin.login')->with('error_message', 'Email və ya parol yanlışdır');
        }
    }
    public function logout()
    {
        auth()->logout();
        return view('admin-panel.auth.logout');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin = User::findOrFail($id);
        return view('admin-panel.auth.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'email' => 'email|required',
            'current_password' => 'required',
        ]);


        $admin = User::findOrFail($id);

        if (Hash::check($request->current_password, $admin->password)) {
            $admin->name = $request->name;
            $admin->email = $request->email;
            if ($request->new_password) {
                $admin->password = Hash::make($request->new_password);
            }
            $admin->save();
            return redirect()->back()->with('update_message', 'Dəyişikliklər uğurla yadda saxlanıldı');
        } else {
            return redirect()->back()->with('error_message', 'Mövcud şifrə düzgün deyil');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
