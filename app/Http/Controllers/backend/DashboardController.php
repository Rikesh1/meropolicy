<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\InsuranceType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class DashboardController extends BackendController
{

    public function index(Request $request)
    {
        if ($request->isMethod('get')) {
            return view($this->backendPath . 'dashboard');
        }
        return false;
    }
}
