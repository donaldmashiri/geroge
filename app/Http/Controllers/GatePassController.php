<?php

namespace App\Http\Controllers;

use App\Models\GatePass;
use Illuminate\Http\Request;

class GatePassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gatePasses = GatePass::all();
        return view('gatepasses.index', compact('gatePasses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gatepasses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'description' => 'required|string|max:255',
            'asset_id' => 'required|string|max:255',
        ]);

        $gatePasses = GatePass::create([
            'asset_id' => $validatedData['asset_id'],
            'description' => $validatedData['description'],
            'status' => 'pending',
            'user_id' => auth()->user()->id,
        ]);

        return back()->with('success', 'Gate Passes created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(GatePass $gatePass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GatePass $gatePass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GatePass $gatePass)
    {
        // 'pending', 'approved', 'rejected'
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GatePass $gatePass)
    {
        //
    }
}
