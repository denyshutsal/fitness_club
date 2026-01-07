<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    /**
     * Show users list
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user
     */
    public function create()
    {
        $roles = Role::where('role', '!=', 'admin')->get();
        return view('users.create', compact('roles'));
    }

    /**
     * Store the user
     */
    public function store(Request $request)
    {

        // Data validation
        $data = $request->validate([
            'name' => ['required', 'regex:/^[\pL\s\-]+$/u', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'role_id' => [
                'required',
                Rule::exists('roles', 'id')->where(fn ($q) => $q->where('role', '!=', 'admin')),
            ],
            'password' => ['required', 'min:6', 'confirmed'],
            'phone' => ['nullable','string','regex:/^\+7\d{10}$/'],
        ], [
            'phone.regex' => 'The phone format must be 11 digits starting with 7 (+7XXXXXXXXXX)',
        ]);

        // Clear a phone of all characters except numbers
        $phone = $data['phone'] ? preg_replace('/\D+/', '', $data['phone']) : null;

        // Creating a user (password is hashed automatically via cast)
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role_id' => $data['role_id'],
            'password' => $data['password'],
        ]);

        // Save a phone (can be null)
        if ($phone) {
            $user->phones()->create(['phone' => $phone]);
        }

        return redirect()
            ->route('users.index')
            ->with('success', 'User created!');
    }

    /**
     * Display a specific user
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::where('role', '!=', 'admin')->get();
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // Data validation
        $data = $request->validate([
            'name' => ['required', 'regex:/^[\pL\s\-]+$/u', 'max:255'],
            'email' => ['required', 'email', "unique:users,email,{$user->id}"],
            'role_id' => [
                'required',
                Rule::exists('roles', 'id')->where(fn ($q) => $q->where('role', '!=', 'admin')),
            ],
            'phone' => ['nullable','string','regex:/^\+7\d{10}$/'],
            'password' => ['nullable','min:6','confirmed'],
        ], [
            'phone.regex' => 'The phone format must be 11 digits starting with 7 (+7XXXXXXXXXX)',
        ]);

        // Clear a phone of all characters except numbers
        $phone = $data['phone'] ? preg_replace('/\D+/', '', $data['phone']) : null;

        // Updating user data
        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'role_id' => $data['role_id'],
        ]);

        // Updating or creating a phone
        if ($phone) {
            if ($user->phones()->exists()) {
                $user->phones()->first()->update(['phone' => $phone]);
            } else {
                $user->phones()->create(['phone' => $phone]);
            }
        } else {
            // If the phone number input field is empty, the number will be deleted
            if ($user->phones()->exists()) {
                $user->phones()->first()->delete();
            }
        }

        // Update a password if provided
        if (!empty($data['password'])) {
            $user->update(['password' => $data['password']]);
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
        return redirect()
            ->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
