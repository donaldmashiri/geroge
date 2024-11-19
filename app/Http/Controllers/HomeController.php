<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\GatePass;
use App\Models\User;
use Illuminate\Http\Request;
use PHPUnit\Framework\Attributes\Medium;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function report()
    {
       // Count total users
        $usersTotal = User::count();

        // Count users with role 'manager'
        $managersTotal = User::where('role', 'manager')->count();
        $guardsTotal = User::where('role', 'guard')->count();

        // Count total assets by type
        $totalAssetsLow = Asset::where('type', 'low')->count();
        $totalAssetsMedium = Asset::where('type', 'medium')->count();
        $totalAssetsHigh = Asset::where('type', 'high')->count();

        // Count gate passes by status
        $pendingGatePasses = GatePass::where('status', 'pending')->count();
        $acceptedGatePasses = GatePass::where('status', 'approved')->count();
        $rejectedGatePasses = GatePass::where('status', 'rejected')->count();

        return view('report', compact(
            'usersTotal',
            'managersTotal',
            'guardsTotal',
            'totalAssetsLow',
            'totalAssetsMedium',
            'totalAssetsHigh',
            'pendingGatePasses',
            'acceptedGatePasses',
            'rejectedGatePasses'
        ));
    }
}
