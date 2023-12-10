<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Withdraw;
use App\Models\User;

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

        $all_users_balance = User::where('is_admin', 0)->sum('current_balance');
        $withdrawCount     = Withdraw::where('status','pending')->count();

        return view('home', compact('orders', 'total_earning', 'current_balance', 'orderSum', 'withdrawCount', 'all_users_balance'));
    }
}
