<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Http\Requests\PostStoreRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Product;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Postes = Post::with('Producto', 'user')->get();
        
        return response()->json($Postes);
    }
    
    public function create()
    {
        //
    }
    
    public function store(PostStoreRequest $request)
    {
        $data = $request->validated();

        $nuevaPost = new Post();

        $Producto = Product::find($data['producto_id']);

        $nuevaPost->product()->associate($Producto);
        $nuevaPost->user()->associate(Auth::user());
        $nuevaPost->save();
        
        return response()->json($nuevaPost);
    }

    public function show($id)
    {
        //return response()->json(Post::with('comentarios.respuestas', 'user')->get());
    
        return inertia('Usuario/Perfil');
    }

    public function destroy($id){

        $this->validarID($id);

        $Post = Post::find($id);
        $resultado = ['mensaje' => 'La Post ya fue eliminado anteriormente'];

        if($Post){
            $resultado = $Post->delete();
        }
        return response()->json($resultado);
    }

    public function validarID($id){

        $validator = Validator::make(['id' => $id],[
            'id' => 'required|exists:Postes,id',
        ], ['*.exists' => 'La Post no se encuentra en la base de datos']);

        if($validator->fails()){
            throw new HttpResponseException(response()->json([
                'success'   => false,
                'message'   => 'Error en la validacion',
                'data'      => $validator->errors()
            ]));
        }
    }
}
