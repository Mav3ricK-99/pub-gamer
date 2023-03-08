<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Exceptions\HttpResponseException;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Subcategoria;
use App\Models\Categoria;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\Cache\Store;
use stdClass;

class ProductController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Products = Product::all();

        return response()->json($Products);
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
    public function store(ProductRequest $request)
    {
        $dataProduct = $request->all();

        $Product = Product::create($dataProduct);

        $Product->save();

        return response()->json($Product);
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Product = Product::find($id);

        return response()->json($Product);
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $this->validarID($id);

        $dataProduct = $request->all();

        $Product = Product::find($id);

        $Product->update($dataProduct);

        return response()->json($Product);
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->validarID($id);

        $Product = Product::find($id);

        $resultado = ['mensaje' => 'El Product ya fue eliminado anteriormente'];

        if ($Product) {
            $resultado = $Product->delete();
        }
        return response()->json($resultado);
    }

    //este metodo no va aca bruh si no en controlador publicaciones
    public function getPublicacionByProduct($id)
    {

        $Product = Product::find($id);

        return response()->json($Product->publicacion);
    }

    public function validarID($id)
    {

        $validator = Validator::make(['id' => $id], [
            'id' => 'required|exists:Products,id',
        ], ['*.exists' => 'El Product no se encuentra en el sistema']);

        if ($validator->fails()) {
            throw new HttpResponseException(response()->json([
                'success'   => false,
                'message'   => 'Error en la validacion',
                'data'      => $validator->errors()
            ]));
        }
    }

    public function menuProducts()
    {
        $listaCategorias = Category::with(['subcategoria'])->get();
        $menu = [];

        foreach ($listaCategorias as $categoria) {

            $menuCategoria = new stdClass();
            $menuCategoria->class = "pt-1 pb-1";
            $menuCategoria->label = $categoria->nombre;
            $menuCategoria->items = [];
            foreach ($categoria->subcategoria as $subcategoria) {

                $menuSubCategoria = new stdClass();
                $menuSubCategoria->class = "pt-1 pb-1";
                $menuSubCategoria->label = $subcategoria->nombre;
                array_push($menuCategoria->items, $menuSubCategoria);
            }
            array_push($menu, $menuCategoria);
        }

        return response()->json($menu);
    }

    public function buscar($criterio)
    {
        $prods = Product::where('nombre', 'LIKE', '%' . $criterio . '%')
            ->orWhere('fabricante', 'LIKE', '%' . $criterio . '%')
            ->get();

        foreach ($prods as $prod) {
            $prod->imagen = "data:image/jpeg;base64," . base64_encode(Storage::get('imagenes/Products/cpu-i7.jpg'));
        }

        return response()->json($prods);
    }
}
