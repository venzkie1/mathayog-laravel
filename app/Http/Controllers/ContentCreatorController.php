<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContentCreatorController extends Controller
{
    //
    public function CCDashboard()
    {
        return view('ContentCreator.cc_dashboard');
    }

    public function CCQuestion()
    {
        return view('ContentCreator.cc_question');
    }

    public function CCLogin()
    {
        return view('ContentCreator.cc_login');
    }
}
