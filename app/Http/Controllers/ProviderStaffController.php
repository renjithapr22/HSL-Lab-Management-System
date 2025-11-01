<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Models\ProviderStaff;
use Illuminate\Http\Request;
use App\Models\User;

class ProviderStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staff =  ProviderStaff::with('provider')->latest()->get();
        return view('providerstaff.index', compact('staff'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $providers = Provider::all();
        return view('providerstaff.create', compact('providers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'provider_id' => 'required|exists:providers,id',
            'name' => 'required|string|max:255',
            'role' => 'nullable|string|max:100',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
        ]);
        

         // 1️⃣ Create user account
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt('password123'), // temporary password
        ]);
        $validated['user_id'] = $user->id;
        $user->assignRole('staff');
        ProviderStaff::create($validated);
        

        return redirect()->route('provider-staff.index')
            ->with('success', 'Provider staff added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProviderStaff $providerStaff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProviderStaff $providerStaff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProviderStaff $providerStaff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProviderStaff $providerStaff)
    {
        $providerStaff->delete();
        return back()->with('success', 'Provider staff deleted successfully!');
    }
}
