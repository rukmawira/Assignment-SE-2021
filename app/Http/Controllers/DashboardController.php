<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::user()->hasRole('admin'))
        {
            return view('dashboard');
        }
        elseif(Auth::user()->hasRole('patient'))
        {
            // $batch = DB::table('batch')->count();
            return view('dashboardP');
        }   
        else
        {
            return view('');
        }
    }
}
