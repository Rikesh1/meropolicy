<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    protected $backendPath = 'backend.';
    protected $insuranceTypePath = '';

    public function __construct()
    {
        $this->insuranceTypePath = $this->backendPath . 'insurance_type.';
    }
}
