<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{

    //authentifié
    protected $redirectPath = '/membres/espace_membre';
    //non authentifié
    protected $loginPath = 'auth/login';
    protected $logoutPath = 'auth/logout';
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;



    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

        return User::create([
            'name' => $data['name'],
            'prenom' => $data['prenom'],
            'pseudo' => $data['pseudo'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'tel' => $data['tel'],
            'pays' => $data['pays'],
            'date' => $data['date'],
            'genre' => $data['genre'],
            'numpostal' => $data['numpostal'],
            'nomville' => $data['nomville'],
            'nomrue' => $data['nomrue'],
            'numerorue' => $data['numerorue'],

        ]);

    }
    public function  register()
    {
        $title = "S'inscrire";
        return view('auth/register')->with(['title' => $title]);
    }

    public function  login()
    {
        $title = "accueil";
        return view('auth/login')->with(['title' => $title]);
    }
}
