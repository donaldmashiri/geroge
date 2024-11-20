<?php

namespace App\Http\Controllers;

use App\Models\Dispatch;
use App\Models\GatePass;
use Illuminate\Http\Request;

class DispatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dispatches = Dispatch::all();
        return view('dispatches.index', compact('dispatches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Get IDs of gate passes that have already been dispatched
        $dispatchedGatePassIds = Dispatch::pluck('gate_pass_id')->toArray();

        // Get gate passes that are approved and not in the dispatched list
        $gatePasses = GatePass::where('status', 'approved')
            ->whereNotIn('id', $dispatchedGatePassIds)
            ->get();

        if ($gatePasses->isEmpty()) {
            return back()->with('error', 'No available gate passes for dispatch.');

        }

        return view('dispatches.create', compact('gatePasses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'dispatched_to' => 'required|string|max:255',
            'gate_pass_id' => 'required',
        ]);

        $dispatch = Dispatch::create([
            'gate_pass_id' => $validatedData['gate_pass_id'],
            'dispatched_to' => $validatedData['dispatched_to'],
            'user_id' => auth()->user()->id,
        ]);

        return back()->with('success', 'Asset dispatched successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dispatch $dispatch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dispatch $dispatch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dispatch $dispatch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dispatch $dispatch)
    {
        //
    }
}
