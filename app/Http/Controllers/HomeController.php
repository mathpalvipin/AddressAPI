<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\address;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {    $add= address::where('user_id',auth()->id())->first();
        return view('home')->with('add',$add);
    }
}
