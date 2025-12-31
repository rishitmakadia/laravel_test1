<?php

namespace App\Http\Controllers;

use App\Models\DbTable;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attr = DbTable::all();
        // return view("welcome");
        return view("user.database", ["tableValue" => $attr]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("user.user");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required",
            "email" => "required|email",
            "age" => "required|numeric",
            "position" => "required",
            "company" => "required",
        ]);
        $new_user = DbTable::create($data);
        return redirect()->route("user.user");

        //     $new_user = new DbTable();
        // $new_user->name = $data['name'];
        // $new_user->email = $data['email'];
        // $new_user->age = $data['age'];
        // $new_user->position = $data['position'];
        // $new_user->company = $data['company'];

        // $new_user->save();
        // dd($request->name);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DbTable  $user)
    {
        return view("user.user", ["user" => $user]);
        // dd($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DbTable $user)
    {
        $data = $request->validate([
            "name" => "required",
            "email" => "required|email",
            "age" => "required|numeric",
            "position" => "required",
            "company" => "required",
        ]);
        // $updated_user = DbTable::where('data', $request->id)->first();
        $user->update($data); 
        return redirect()->route("user.user");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DbTable $user)
    {
        $user->delete();
        return redirect()->route("user.user");
    }
}
