<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function change($lang)
    {
        Session::put('locale', $lang);
Session::save();
        return redirect()->back();

    }
}
