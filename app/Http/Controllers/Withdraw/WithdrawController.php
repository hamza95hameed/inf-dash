<?php

namespace App\Http\Controllers\Withdraw;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Withdraw;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use App\Mail\WithdrawMail;

class WithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $withdraws = Withdraw::all();

        if($user->is_admin == 0){
            $withdraws = Withdraw::where('user_id', $user->id)->get();
        }

        return view('admin.withdraw.list', compact('withdraws'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        return view('admin.withdraw.add', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $user = auth()->user();

        if($user->is_admin == 0 && $user->current_balance > 10){

            $withdraw = Withdraw::create([
                'user_id' => $user->id,
                'amount'  => $user->current_balance,
                'status'  => 'pending',
            ]);
    
            $current_balance = $user->current_balance - $withdraw->amount;
            $total_withdraw  = $user->total_withdraw + $withdraw->amount;
    
            $user->update([
                'current_balance' => $current_balance,
                'total_withdraw'  => $total_withdraw
            ]);
       
            $details = [
                'name'   => $user->name,
                'amount' => $withdraw->amount,
                'iban'   => $user->iban,
            ];
           
            Mail::to(env('ADMIN_EMAIL'))->send(new WithdrawMail($details));
        }

        return redirect()->route("withdraws.index")->with("success","Withdraw request created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $withdraw = Withdraw::find($id);

        $withdraw->update([
            'status' => 'complete',
            'completed_at' =>  date('Y-m-d H:i:s'),
        ]);

        return response()->json(true, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
