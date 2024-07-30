<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Display a listing of the admins
    public function index()
    {
        $admins = User::whereIn('role', ['admin', 'content_writer'])->get();
        confirmDelete();
        return view('admins.index', compact('admins'));
    }

    // Show the form for creating a new admin
    public function create()
    {
        return view('admins.create');
    }

    // Store a newly created admin in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:admin,content_writer',
        ]);
    
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
    
        return redirect()->route('admins.index')->with('success', 'Admin created successfully.');
    }

    // Show the form for editing the specified admin
    public function edit(User $admin)
    {
        return view('admins.edit', compact('admin'));
    }

    // Update the specified admin in storage
    public function update(Request $request, User $admin)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $admin->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|in:admin,content_writer',
        ]);

        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $admin->password,
            'role' => $request->role,
        ]);

        return redirect()->route('admins.index')->with('success', 'Admin updated successfully.');
    }

    // Remove the specified admin from storage
    public function destroy(User $admin)
    {
        $admin->delete();
        return redirect()->route('admins.index')->with('success', 'Admin deleted successfully.');
    }
}
