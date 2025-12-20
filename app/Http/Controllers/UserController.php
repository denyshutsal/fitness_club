<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::where('role', '!=', 'admin')->get();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Clear your phone of all characters except numbers
        $phone = $request->phone ? preg_replace('/\D+/', '', $request->phone) : null;

        $data = $request->validate([
            'name' => ['required', 'regex:/^[\pL\s\-]+$/u', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'role_id' => [
                'required',
                Rule::exists('roles', 'id')->where(function ($query) {
                    $query->where('role', '!=', 'admin');
                }),
            ],
            'password' => ['required', 'min:6', 'confirmed'],
            'phone' => ['nullable','string','regex:/^\+7\d{10}$/'],
            ], [
           'phone.regex' => 'The phone format must be 11 digits starting with 7 (+7XXXXXXXXXX)',
            ]
        );

        $data['phone'] = $phone;

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role_id' => $data['role_id'],
            'password' => $data['password'],
        ]);

        // Create a phone (can be null)
        if (!empty($data['phone'])) {
            $user->phones()->create([
                'phone' => $data['phone'],
            ]);
        }

        return redirect()
            ->route('users.index')
            ->with('success', 'User created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource
     */
    public function edit(User $user)
    {
        $roles = Role::where('role', '!=', 'admin')->get();
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage (including password and phone).
     */
    public function update(Request $request, User $user)
    {
        
        // Clear your phone of all characters except numbers
        $phone = $request->phone ? preg_replace('/\D+/', '', $request->phone) : null;

        $data = $request->validate([
            'name' => ['required', 'regex:/^[\pL\s\-]+$/u', 'max:255'],
            'email' => ['required', 'email', "unique:users,email,{$user->id}"],
            'phone' => ['nullable','string','regex:/^\+7\d{10}$/'],
            'role_id' => [
                'required',
                Rule::exists('roles', 'id')->where('role', '!=', 'admin'),
            ],
            'password' => ['nullable','min:6','confirmed'],
        ], [
            'phone.regex' => 'The phone format must be 11 digits starting with 7 (+7XXXXXXXXXX)',
        ]);

        // Update name and email
        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'role_id' => $data['role_id'],
        ]);

        // Update or create phone
        $data['phone'] = $phone;
        
        if ($user->phones()->exists()) {
            $user->phones()->first()->update([
                'phone' => $data['phone'],
            ]);
        } else {
            $user->phones()->create([
                'phone' => $data['phone'],
            ]);
        }

        // Update password if provided
        if (!empty($data['password'])) {
            $user->update([
                'password' => $data['password'],
            ]);
        }
        
        return redirect()
            ->route('users.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
