<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 

class SessionsController extends Controller
{

  public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']);
    }

    public function create(){

    	   return view('users.login');

    }

    public function store()
    {
        if (! auth()->attempt(request(['email','password']))){
            return back()->withErrors([
                  'message' => 'Please check your credentials and try agine'
              ]);
        }
        return redirect('/users/dashboard');
    }
    
  public function destroy(){

   	auth()->logout();

   	return redirect('/');
   }


}
