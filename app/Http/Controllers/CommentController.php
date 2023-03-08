<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentStoreRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Models\Comment;
use App\Models\Publicacion;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentStoreRequest $request)
    {
        $data = $request->all();

        $Comment = new Comment();
        $publicacion = Publicacion::find($data['publicacion_id']);

        $Comment->mensaje = $data['mensaje'];
        $Comment->user()->associate($request->user());
        if(isset($data['respuesta_id'])){
            $Comment->respuesta_id = $data['respuesta_id'];
        }

        $publicacion->Comments()->save($Comment);
        
        return response()->json($Comment);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Comment::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->validarID($id);

        $Comment = Comment::find($id);
        $resultado = ['mensaje' => 'El Comment ya fue eliminado anteriormente'];

        if($Comment){
            $resultado = $Comment->delete();
        }

        return response()->json($resultado);
    }

    public function validarID($id){

        $validator = Validator::make(['id' => $id],[
            'id' => 'required|exists:Comments,id',
        ], ['*.exists' => 'El Comment no se encuentra en la base de datos']);

        if($validator->fails()){
            throw new HttpResponseException(response()->json([
                'success'   => false,
                'message'   => 'Error en la validacion',
                'data'      => $validator->errors()
            ]));
        }
    }
}
