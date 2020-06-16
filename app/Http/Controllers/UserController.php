<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
      return view('settings', [
        'user' => $user
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
      if (request()->email === $user->email){
        $editUser = $this->validatePassword();
        if ($editUser['password'] === request()->confirmPass) {
          $editUser['password'] = Hash::make($editUser['password']);
          $user->update(['password' => $editUser['password']]);
          session()->flash('status', 'Password updated!');
        } else {
        session()->flash('status', 'Sorry, something went wrong with updating your password!');}
      } elseif (Hash::check(request()->password, $user->password)){
        $editUser = $this->validateEmail();
        $user->update(['email' => $editUser['email']]);
        session()->flash('status', 'Email updated!');
        } else {
      session()->flash('status', 'Sorry, something went wrong with updating your email!');}

      return redirect(route('welcome'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
      User::destroy($user->id);
      return redirect(route('welcome'));
    }

    private function validateEmail () 
    {
      return request()->validate([
        'email'     => 'email:filter|unique:users,email',
        'password'  => 'password'
      ]);
    }

    private function validatePassword () 
    {
      return request()->validate([
        'email' => 'exists:users,email',
        'password' => 'required'
      ]);
    }
}
