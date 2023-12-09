<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Withdraw;

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
        $total_earning = $current_balance = 0;

        if($user->is_admin == 0){
           $query = $query->where('user_id', $user->id);
           $total_earning   = $user->total_earning;
           $current_balance = $user->current_balance;
        }

        $orders   = $query->get();
        $orderSum = $query->sum('commission');

        $withdrawCount = Withdraw::where('status','pending')->count();

        return view('home', compact('orders', 'total_earning', 'current_balance', 'orderSum', 'withdrawCount'));
    }
}
