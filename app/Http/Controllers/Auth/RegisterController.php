<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\RegisterRequest;

use Inertia\Inertia;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /*  Igual deberia haber pagina para el registro
    public function show(){
        return Inertia("Usuario/Registro");
    }*/

    public function register(RegisterRequest $request)
    { 
        $data = $request->validated();

        //Aca no se valida el apellido . . .
        $data['nombre'] = "{$data['nombre']} {$request['apellido']}";

        $nuevoUsuario = new User($data);
        $nuevoUsuario->save();

        $this->guard()->login($nuevoUsuario);

        //Abajo va Redirect
        return Inertia::render('Dashboard/Dashboard', ['usuario' => [
            'nombre' => $nuevoUsuario->nombre,
            'email' => $nuevoUsuario->email,
        ]]);
    }

}
