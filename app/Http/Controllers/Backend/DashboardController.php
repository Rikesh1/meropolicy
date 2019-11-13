<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
