<?php

namespace App\Http\Controllers;

use App\Entities\Survey;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $surveys = Survey::with('shop')->get();

        return view('admin.dashboard', compact(['user', 'surveys']));
    }
}
