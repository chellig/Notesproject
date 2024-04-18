<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class RegisterController extends Controller
{
public function register(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed', 
        'image' => '',
    ]);
    
$user = User::create([
'name' => $request->name,
'email' => $request->email,
'password' => Hash::make($request->password),
'image' => $request->image,
]);
$token = $user->createToken('token-name')->plainTextToken;
return response()->json([
'status' => true,
'message' => 'User Created Successfully',
'token' => $token
], 200);
}
}