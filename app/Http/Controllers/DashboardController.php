<?php

namespace App\Http\Controllers;

use Laratrust\Laratrust;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public static function index()
    {
        if (Auth::user()->hasRole('student')) {
            return view('student.home.pages.index');
        } elseif (Auth::user()->hasRole('admin')) {
            return view('admin.dashboard.index');
        } elseif (Auth::user()->hasRole('guest')) {
            return view('guest.home.index');
        }
    }
}
