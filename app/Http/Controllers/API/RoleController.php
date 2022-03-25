<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Http\Requests\RoleStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Role;

class RoleController extends Controller
{

    public function index(){

        $roles = Role::with(['permisos'])->get();

        return response()->json($roles);
    }

    public function store(RoleStoreRequest $request)
    {
        $data = $request->all();

        $rol = Role::create([
            'descripcion' => $data['nombreRol'],
        ]);

        $rol->save();
        
        return response()->json($rol);
    }

    public function update(RoleStoreRequest $request, $id){

        $this->validarID($id);

        $data = $request->all();

        $rol = Role::find($id);

        $rol->descripcion = $data['descripcion'];

        $rol->save();

        return response()->json($rol);
    }

    public function show($id){

        $this->validarID($id);
        
        $rol = Role::withTrashed()->find($id)->with(['permisos']);

        return response()->json($rol);
    }

    public function destroy($id){

        $this->validarID($id);

        //Puede que haya que agregar first()
        $rol = Role::find($id);
        $resultado = ['mensaje' => 'El rol ya fue eliminado anteriormente'];

        if($rol){
            $resultado = $rol->delete();
        }
        return response()->json($resultado);
    }

    public function validarID($id){

        $validator = Validator::make(['id' => $id],[
            'id' => 'required|exists:user_roles,id',
        ], ['*.exists' => 'El Rol no se encuentra en la base de datos']);

        if($validator->fails()){
            throw new HttpResponseException(response()->json([
                'success'   => false,
                'message'   => 'Error en la validacion',
                'data'      => $validator->errors()
            ]));
        }
    }
}
