<?php

namespace App\Http\Controllers;

use App\Models\Asset;
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
        return view('gate-passes.index', data: compact('gatePasses'));
    }

    public function pending()
    {
        $gatePasses = GatePass::where('status', 'pending')->get();
        return view('gate-passes.pending', compact('gatePasses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $assets = Asset::all();
        return view('gate-passes.create', compact('assets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'description' => 'required|string|max:255',
            'asset_id' => 'required',
            'quantity' => 'required',
        ]);

        $gatePasses = GatePass::create([
            'asset_id' => $validatedData['asset_id'],
            'description' => $validatedData['description'],
            'quantity' => $validatedData['quantity'],
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
    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'action' => 'required|in:approve,reject',
        ]);

        // Find the gate pass by ID
        $gatePass = GatePass::findOrFail($id);

        // Update the status based on the action
        if ($validated['action'] === 'approve') {
            $gatePass->status = 'approved';
        } elseif ($validated['action'] === 'reject') {
            $gatePass->status = 'rejected';
        }

        // Save the updated gate pass
        $gatePass->save();

        // Redirect back with a success message
        return back()->with('success', 'Gate pass status updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GatePass $gatePass)
    {
        //
    }
}
