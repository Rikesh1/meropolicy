<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:merchant');
	}
	
    public function index()
    {
    	return view('merchant.dashboard');
    }
}
