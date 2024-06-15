<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LaboratoryEmployeeLoginRequest;


class LaboratoryEmployeeController extends Controller
{
    public function store(LaboratoryEmployeeLoginRequest $request)
    {
        if ($request->authenticate()) {
            $request->session()->regenerate();
            return redirect()->intended(RouteServiceProvider::LABORATORYEMPLOYEE);
        }
        return redirect()->back()->withErrors(['name' => trans('Dashboard/auth.failed')]);
    }

    public function destroy(Request $request)
    {
        Auth::guard('laboratory_employee')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
