<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    public function register(Request $request){
        $validatedData = $request -> validate([
            'name'=>'unique:users',
            'email'=>'required | unique:users',
            'password'=>'required',
        ]);


        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create($validatedData);

        $accessToken = $user->createToken('authToken')->accessToken;

        return response(['user'=>$user, 'access_token'=>$accessToken]);
    }

    public function login(Request $request){
        $loginData = $request -> validate([
            'name'=>'required',
            'password'=>'required'
        ]);

        if(!Auth::attempt($loginData)){
            $res= '';
            if(!User::where('name','=',$loginData['name'])->exists()){
               return $res = 'USER ERROR';
            }else{
               return $res = 'PASS ERROR';
            }
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response(['user'=>auth()->user(), 'role'=>auth()->user()->role , 'access_token'=>$accessToken]);

    }

    public function logout(Request $request){

        Auth::logout();

    }

    public function update($id, Request $request) {

        $user = User::find($id);
        // echo Hash::make($request->oldPassword);
        $hashedPassword =$user->password ;

        $res= '';

        if (Hash::check($request->oldPassword , $hashedPassword)) {
            $user->password = Hash::make($request->newPassword);
            $user->save();
            return $res='Password Updated!';
        }else return $res="Incorrect Password.";
    }

}
