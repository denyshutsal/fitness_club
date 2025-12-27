<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::withCount('users')->get();

        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'role' => [
                'required',
                'string',
                'max:255',
                'unique:roles,role',
                'regex:/^[A-Za-z\s]+$/', // only Latin letters and spaces.
            ],
        ]);

        Role::create([
            'role' => strtolower($request->role),
        ]);

        return redirect()->route('roles.index')
            ->with('success', 'The role was successfully added');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        // Protection: Cannot delete admin role.
        if ($role->role === 'admin') {
            return redirect()
                ->route('roles.index')
                ->with('error', 'Cannot delete admin role');
        }

        if ($role->users()->exists()) {
            return redirect()
                ->route('roles.index')
                ->with('error', 'Cannot delete a role with users');
        }

        $role->delete();

        return redirect()->route('roles.index')
            ->with('success', 'The role was successfully removed');
    }
}
