<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

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
    {
        $user  = auth()->user();
        $query = Order::orderBy('commission', 'desc');

        if($user->is_admin == 0){
           $query = $query->where('user_id', $user->id);
        }

        $orders = $query->get();

        return view('home', compact('orders'));
    }
}
