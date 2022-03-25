<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PermisoStoreRequest;
use App\Http\Requests\PermisoUpdateRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Models\Permiso;
use App\Models\Role;

class PermisoController extends Controller
{
    public function index(Request $request){

        $permisos = Permiso::with(['roles'])->get();

        return response()->json($permisos);
    }

    public function store(PermisoStoreRequest $request)
    {
        $data = $request->all();

        $rol = Role::where('descripcion', $data['rol'])->first();
        
        $permiso = Permiso::create(['permiso' => $data['permiso']]);
        $permiso->roles()->save($rol);

        return response()->json($permiso);
    }

    public function show($id){
        
        $this->validarID($id);
            
        $permiso = Permiso::find($id);
    
        return response()->json($permiso);
    }

    public function update(PermisoUpdateRequest $request, $id){

        $this->validarID($id);

        $data = $request->all();

        $permiso = Permiso::find($id);

        $permiso->permiso = $data['permiso'];

        $permiso->save();

        return response()->json($permiso);
    }

    public function destroy($id){

        $this->validarID($id);

        $permiso = Permiso::find($id);
        $resultado = ['mensaje' => 'El permiso ya fue eliminado anteriormente'];

        if($permiso){
            $resultado = $permiso->delete();
        }
        return response()->json($resultado);
    }

    public function validarID($id){

        $validator = Validator::make(['id' => $id],[
            'id' => 'required|exists:permisos,id',
        ], ['*.exists' => 'El Permiso no se encuentra en la base de datos']);

        if($validator->fails()){
            throw new HttpResponseException(response()->json([
                'success'   => false,
                'message'   => 'Error en la validacion',
                'data'      => $validator->errors()
            ]));
        }
    }
}
