<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignUpRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function login(){
        // User::create([
        //     "name"=> "saad",
        //     "email"=> "msiaidsaad@gmail.com",
        //     "password"=> Hash::make("saad1234")
                
        // ]);
       
        return view('login');
    }
    public function insc(){
       
        return view('inscr');
    }
    public function Plogin(LoginRequest $req) {
        $etatLog=$req->validated(); 
      //   dd( $req['email']); 
        if(Auth::attempt($etatLog)){      
           
  
        session()->regenerate();
   
        return redirect()->intended(route('home'));  

        }
        $status="Email ou mot de passe invalide";
        session()->flash("status",$status);
    return to_route('auth.login');
    //->withErrors(["email"=>'Email ou mot de passe invalide'])->withInput(['email','password']);
    }
    function logout() {
        Auth::logout();
        return to_route('client.index');
    }
    function inscrire(SignUpRequest $req) {
        $etatLog=$req->validated();
       // dd($etatLog['email']); 
       if(Auth::attempt($etatLog)){      
        $status="email deja existe";
        session()->flash("status",$status);
   
        return redirect()->route('auth.insc');  

        }

       User::create([
        "name"=> $etatLog['name'],
        "email"=> $etatLog['email'],
        "password"=> Hash::make($etatLog['password'])
            
    ]);
    return to_route('auth.login');
    
    }


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
