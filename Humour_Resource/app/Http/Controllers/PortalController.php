<?php

namespace App\Http\Controllers;

use App\Models\ExclusiveResource;
use Illuminate\Http\Request;

class PortalController extends Controller
{
    public function login()
    {
        return view('pages.portal.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'access_code' => 'required|string',
        ]);

        if ($request->access_code === 'HUMOUR_VIP_2026') {
            session(['vip_access' => true]);
            return redirect()->route('portal.dashboard');
        }

        return back()->withErrors(['access_code' => 'Invalid Access Code.']);
    }

    public function dashboard()
    {
        if (!session('vip_access')) {
            return redirect()->route('portal.login');
        }

        $resources = ExclusiveResource::where('is_active', true)->latest()->get();

        return view('pages.portal.dashboard', compact('resources'));
    }
}