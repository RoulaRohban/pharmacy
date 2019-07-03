<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
     * @return Renderable
     */
    public function index()
    {
        if (auth()->user()->hasRole('pharmacist'))
            return redirect('/drugs');
        else if (auth()->user()->hasRole('user'))
            return redirect('/welcome1');

        return view('welcomm');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('Login');
    }
}
