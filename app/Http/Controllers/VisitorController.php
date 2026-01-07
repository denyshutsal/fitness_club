<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\VisitorCredentialsMail;

class VisitorController extends Controller
{

    /**
     * Display a specific visitor
     */
    public function show(Visitor $visitor)
    {
        $visitor->load('phones');

        return view('visitors.show', compact('visitor'));
    }

     /**
     * Show visitors list
     */
    public function index()
    {
        $visitors = Visitor::with('phones')->get();

        return view('visitors.index', compact('visitors'));
    }

    /**
     * Show the form for creating a new visitor
     */
    public function create()
    {
        return view('visitors.create');
    }

    /**
     * Store the visitor
     */
    public function store(Request $request)
    {
        
        // Data validation
        $data = $request->validate([
            'name'  => ['required', 'string', 'max:255', 'regex:/^[\pL\s\-]+$/u'],
            'email' => ['required', 'email', 'unique:visitors,email'],
            'phone' => ['nullable', 'string', 'regex:/^\+7\d{10}$/'],
        ], [
            'phone.regex' => 'The phone format must be 11 digits starting with 7 (+7XXXXXXXXXX)',
        ]);

        // Clear a phone of all characters except numbers
        $phone = $data['phone'] ? preg_replace('/\D+/', '', $data['phone']) : null;

        // Generate a random password for visitor
        $plainPassword = Str::random(10);

        // Create a visitor (password is hashed automatically via cast)
        $visitor = Visitor::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => $plainPassword,
        ]);

        // Save a phone (can be null)
        if ($phone) {
            $visitor->phones()->create([
                'phone' => $phone,
            ]);
        }

        // Send a letter with a password to the new visitor
        Mail::to($visitor->email)
            ->send(new VisitorCredentialsMail($visitor, $plainPassword));

        return redirect()
            ->route('visitors.index')
            ->with('success', 'Visitor created and credentials sent via email!');
    }

    /**
     * Show edit form
     */
    public function edit(Visitor $visitor)
    {
        $visitor->load('phones');

        return view('visitors.edit', compact('visitor'));
    }

    /**
     * Update visitor
     */
    public function update(Request $request, Visitor $visitor)
    {
     
        // Data validation
        $data = $request->validate([
            'name'  => ['required', 'string', 'max:255', 'regex:/^[\pL\s\-]+$/u'],
            'email' => ['required', 'email', "unique:visitors,email,{$visitor->id}"],
            'phone' => ['nullable', 'string', 'regex:/^\+7\d{10}$/'],
        ], [
            'phone.regex' => 'The phone format must be 11 digits starting with 7 (+7XXXXXXXXXX)',
        ]);

        // Clear a phone of all characters except numbers
        $phone = $data['phone'] ? preg_replace('/\D+/', '', $data['phone']) : null;

        // Updating visitor data
        $visitor->update([
            'name'  => $data['name'],
            'email' => $data['email'],
        ]);

        // Updating or creating a phone
        if ($phone) {
            $visitor->phones()->updateOrCreate(
                [],
                ['phone' => $phone]
            );
        } else {
            $visitor->phones()->delete();
        }

        return redirect()
            ->route('visitors.index')
            ->with('success', 'Visitor updated successfully!');
    }

    /**
     * Delete visitor
     */
    public function destroy(Visitor $visitor)
    {
        $visitor->delete();

        return redirect()
            ->route('visitors.index')
            ->with('success', 'Visitor deleted successfully!');
    }
}
