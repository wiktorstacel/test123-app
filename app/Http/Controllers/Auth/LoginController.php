<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers; //Trait z LoginController, gdzie są wszystkie metody np login

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout'); //oznacza, że middleware guest nie będzie stosowany do metody logout w kontrolerze.
        //except() - Pozwala wykluczyć konkretne metody kontrolera z zastosowania danego middleware.
        /*W tym przypadku oznacza to, że middleware guest nie będzie działał, 
        gdy wywołana zostanie metoda logout (te metody są w trait AuthenticatesUse).
        Jak to działa w praktyce:
        - Inne metody kontrolera (np. login, register) będą chronione middleware guest. 
          Jeśli użytkownik spróbuje je wywołać będąc zalogowanym, zostanie przekierowany.
        - Metoda logout nie będzie objęta tą ochroną, więc użytkownik będzie mógł się wylogować bez problemu.*/
    }
}
