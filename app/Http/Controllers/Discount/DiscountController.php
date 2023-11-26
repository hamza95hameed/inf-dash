<?php

namespace App\Http\Controllers\Discount;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discounts = Discount::with('user')->get();
        return view("admin.discount.list", compact("discounts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('is_admin', '!=', 1)->get();
        return view("admin.discount.add", compact("users"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            "name"   => "required|string|max:255|unique:discounts,name",
            "type"   => "required",
            'amount' => 'required|numeric'
        ]);

        Discount::create([
            "name"    => $request->name,
            "user_id" => $request->user_id,
            "type"    => $request->type,
            "amount"  => $request->amount,
        ]);

        return redirect()->route("discounts.index")->with("success","Discount created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function show(Discount $discount)
    {   
        return view("admin.discount.show", compact("discount"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function edit(Discount $discount)
    {
        $users = User::where('is_admin', '!=', 1)->get();
        return view("admin.discount.edit", compact("discount", "users"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discount $discount)
    {

        request()->validate([
            "name"   => ["required","string","max:255", Rule::unique('discounts')->ignore($discount->id)],
            "type"   => "required",
            'amount' => 'required|numeric'
        ]);
        
        $discount->update([
            "name"    => $request->name,
            "user_id" => $request->user_id,
            "type"    => $request->type,
            "amount"  => $request->amount,
        ]);
        // dd($request->all(), $discount);

        return redirect()->route("discounts.index")->with("success","Discount updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discount $discount)
    {
        //
    }
}
