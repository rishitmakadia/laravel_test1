<?php

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes (for postman,...)
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::any('/user/register', function () {
    $faker = \Faker\Factory::create();
    $user = new User();
    $user->name = $faker->name;
    $user->email = $faker->unique()->safeEmail;
    $user->password = Hash::make($faker->password);
    if ($user->save()) {
        $token = $user->createToken('token')->plainTextToken;
        return response()->json(['success' => 'Hoorah', 'data' => $user,
            'token' => $token, 'message' => 'User created successfully.']);
    }
    return response()->json(['success' => 'Oops', 'message' => 'Something went wrong.']);
});
