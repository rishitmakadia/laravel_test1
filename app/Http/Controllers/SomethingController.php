<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SomethingController extends Controller
{
    public function fileUpload(Request $request)
    {
        // return $request->file("fileName")->store(""); //Storage->App->
        $request->validate([
            'fileName' => "required|max:2048"
        ]);
        $file = $request->file("fileName");
        return $file->storeAs('', Str::random(5) . '.' . $file->getClientOriginalExtension());
    }
}
