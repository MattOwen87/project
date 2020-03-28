<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show(){
      $user = User::find(Auth::user()->id);

      if($user){
        //USER EXISTS
       return view('profile')->withUser($user);
     }else{
        //RETURN FALSE, USER DOES NOT EXIST
        return redirect()->back();
      }
    }

    public function edit(){
      if(Auth::user()){
        $user = User::find(Auth::user()->id);

        if($user){
          return view('edit')->withUser($user);
        }else{
          return redirect()->back();
        }
      }
    }

    public function update(Request $request){
      $user = User::find(Auth::user()->id);

      if($user){
        $validate = null;
        if(Auth::user()->username === $request['username'] && Auth::user()->email === $request['email']){
            $validate = $request->validate([
              'username'  => 'required|min:2',
              'name'      => 'required|min:2',
              'email'     => 'required|email'
            ]);
        }

        else if(Auth::user()->username === $request['username']){
            $validate = $request->validate([
              'username'  => 'required|min:2',
              'name'      => 'required|min:2',
              'email'     => 'required|email|unique:users'
            ]);
        }
        else if(Auth::user()->email === $request['email']){
          $validate = $request->validate([
            'username'  => 'required|min:2|unique:users',
            'name'      => 'required|min:2',
            'email'     => 'required|email'
          ]);
        }else{
          $validate = $request->validate([
            'username'  => 'required|min:2|unique:users',
            'name'      => 'required|min:2',
            'email'     => 'required|email|unique:users'
          ]);
        }

        if($validate){
          $user->username  = $request['username'];
          $user->name  = $request['name'];
          $user->email = $request['email'];

          $user->save();

          $request->session()->flash('success', 'Your details have now been updated!');
          return redirect()->back();
        }else{
          return redirect()->back();
        }

      }else{
        return redirect()->back();
      }

    }

    public function passwordEdit(){
      if(Auth::user()){
          return view('password');
        }else{
          return redirect()->back();
        }
      }

    public function passwordChange(Request $request){

      $validate = $request->validate([
        'oldPassword' => 'required|min:8',
        'password'    => 'required|min:8|required_with:password_confirmation'
      ]);

      $user = User::find(Auth::user()->id);

      if($user){
        if(Hash::check($request['oldPassword'], $user->password) && $validate){
          $user->password = Hash::make($request['password']);

          $user->save();

          $request->session()->flash('success', 'Your password has been updated!');
          return redirect()->back();
        }else{
          $request->session()->flash('error', 'The entered password does not match your current password!');
          return redirect()->route('password.edit');
        }
      }
    }
}
