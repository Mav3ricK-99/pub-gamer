<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Exceptions\HttpResponseException;
use App\Http\Requests\ProductoRequest;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class ProductoController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();

        return response()->json($productos);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductoRequest $request)
    {
        $dataProducto = $request->all();

        $producto = Producto::create($dataProducto);

        $producto->save();
        
        return response()->json($producto);
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::find($id);

        return response()->json($producto);
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductoRequest $request, $id)
    {
        $this->validarID($id);

        $dataProducto = $request->all();

        $producto = Producto::find($id);

        $producto->update($dataProducto);

        return response()->json($producto);
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->validarID($id);

        $producto = Producto::find($id);

        $resultado = ['mensaje' => 'El producto ya fue eliminado anteriormente'];

        if($producto){
            $resultado = $producto->delete();
        }
        return response()->json($resultado);
    }

    //este metodo no va aca bruh si no en controlador publicaciones
    public function getPublicacionByProducto($id){

        $producto = Producto::find($id);

        return response()->json($producto->publicacion);
    }

    public function validarID($id){

        $validator = Validator::make(['id' => $id],[
            'id' => 'required|exists:productos,id',
        ], ['*.exists' => 'El Producto no se encuentra en el sistema']);

        if($validator->fails()){
            throw new HttpResponseException(response()->json([
                'success'   => false,
                'message'   => 'Error en la validacion',
                'data'      => $validator->errors()
            ]));
        }
    }

    public function buscarProducto($criterio){

        $prods = Producto::where('nombreProducto', 'LIKE', '%'.$criterio.'%')
                    ->orWhere('fabricante', 'LIKE', '%'.$criterio.'%')
                    ->get();

        return response()->json($prods);
    }
}
