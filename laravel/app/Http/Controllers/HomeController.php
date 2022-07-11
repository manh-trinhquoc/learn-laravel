<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $data = [
            'title_1' => 'Home page',
            'title_2' => 'Login successfully',
        ];
        // $user = Auth::user();
        // var_dump(Auth::user());
        // $id = Auth::id();
        // var_dump($id);
        // var_dump($request->user());
        // die(__FILE__);

        return view('home', $data);
    }
}
