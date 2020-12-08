<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginPageController extends Controller
{
    public function loginPage () {
    	return view('pages.login');
    }
}
