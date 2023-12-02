<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userid = auth()->user()->id;
        $users  = User::where('is_admin', 0)->where('id', '!=', $userid)->get();
        return view("admin.users.list", compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.users.add");
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
            "first_name"            => "required|string|max:255",
            "last_name"             => "required|string|max:255",
            "email"                 => "required|email|unique:users,email|max:255",
            "password"              => "required|string|min:8|confirmed",
            "password_confirmation" => "required|string|min:8",
            "phone"                 => "required|string|max:20",
            "city"                  => "required|string|max:255",
            "state"                 => "required|string|max:255",
            "zip_code"              => "required|string|max:255",
            "address"               => "required|string|max:255",
            "iban"                  => "required|string",
            "commission"            => "required|numeric",
        ]);

        User::create([
            "name"       => $request->first_name.' '.$request->last_name,
            "email"      => $request->email,
            "password"   => Hash::make($request->password),
            "phone"      => $request->phone,
            "city"       => $request->city,
            "state"      => $request->state,
            "zip_code"   => $request->zip_code,
            "address"    => $request->address,
            "iban"       => $request->iban,
            "commission" => $request->commission,
        ]);

        return redirect()->route("users.index")->with("success","User created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view("admin.users.show", compact("user"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view("admin.users.edit", compact("user"));
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
        $user = User::find($id);

        request()->validate([
            "email"      => ['required','string','max:255',Rule::unique('users')->ignore($user->id)],
            "first_name" => "required|string|max:255",
            "last_name"  => "required|string|max:255",
            "phone"      => "required|string|max:20",
            "city"       => "required|string|max:255",
            "state"      => "required|string|max:255",
            "zip_code"   => "required|string|max:255",
            "address"    => "required|string|max:255",
            "iban"       => "required|string",
            "commission" => "numeric",
        ]);

        $user->update([
            "name"       => $request->first_name.' '.$request->last_name,
            "email"      => $request->email,
            "password"   => Hash::make($request->password),
            "phone"      => $request->phone,
            "city"       => $request->city,
            "state"      => $request->state,
            "zip_code"   => $request->zip_code,
            "address"    => $request->address,
            "iban"       => $request->iban,
            "commission" => isset($request->commission) ? $request->commission : 0,
        ]);

        return redirect()->back()->with("success","User updated successfully");
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
