<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Http\Requests\PublicacionStoreRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Producto;
use App\Models\Publicacion;

class PublicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publicaciones = Publicacion::with('producto', 'user')->get();
        
        return response()->json($publicaciones);
    }
    
    public function create()
    {
        //
    }
    
    public function store(PublicacionStoreRequest $request)
    {
        $data = $request->all();

        $nuevaPublicacion = new Publicacion();

        $producto = Producto::find($data['producto_id']);

        $nuevaPublicacion->producto()->associate($producto);
        $nuevaPublicacion->user()->associate(Auth::user());
        $nuevaPublicacion->save();
        
        return response()->json($nuevaPublicacion);
    }

    public function show($id)
    {
        return response()->json(Publicacion::with('comentarios.respuestas', 'user')->get());
    }

    public function destroy($id){

        $this->validarID($id);

        $publicacion = Publicacion::find($id);
        $resultado = ['mensaje' => 'La publicacion ya fue eliminado anteriormente'];

        if($publicacion){
            $resultado = $publicacion->delete();
        }
        return response()->json($resultado);
    }

    public function validarID($id){

        $validator = Validator::make(['id' => $id],[
            'id' => 'required|exists:publicaciones,id',
        ], ['*.exists' => 'La publicacion no se encuentra en la base de datos']);

        if($validator->fails()){
            throw new HttpResponseException(response()->json([
                'success'   => false,
                'message'   => 'Error en la validacion',
                'data'      => $validator->errors()
            ]));
        }
    }
}
