<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function show(){
        return response()->json(Auth::check());
        return response()->json("XD te tenes que loguear master");
    }

    public function authenticate(LoginRequest $request)
    {
        $data = $request->validated();

        if (Auth::attempt($data)) {

            $usuario = User::with('roles.permisos')->find(Auth::user()->id);
            $token = Auth::user()->createToken("LeTokken", $usuario->permisos)->accessToken;

            return Inertia::render('Dashboard/Dashboard', ["token" => $token]);
        }

        //Poner lo de abajo en LoginRequest' ?? 
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Error en la validacion',
            'data'      => "{\"email:[\"Alguno de los datos son invalidos\"]}"
        ]));
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::user()->tokens()->delete();
            Auth::logout();
        }

        return redirect(RouteServiceProvider::HOME);
    }
}
