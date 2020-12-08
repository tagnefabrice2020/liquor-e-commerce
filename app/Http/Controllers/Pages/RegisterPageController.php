<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterPageController extends Controller
{
    public function registerPage () {
    	return view('pages.register');
    }
}
