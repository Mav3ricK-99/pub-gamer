<?php

namespace App\Models;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

use App\Exceptions\NoMoreStockException;
class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'producto_id',
        'cantidad'
    ];


    protected $dispatchesEvents = [
        'saving' => \App\Events\UserCartUpdated::class,
        'updating' => \App\Events\UserCartUpdated::class,
    ];

    protected $cartItem = [];
    public $cartItems, $item;

    public function remove(Producto $prod){

        $this->cartItems = Cart::getCart();

        if($this->productExistsInCart($prod)){
            
            
        }
    }

    public function add(Producto $prod, $cantidad){

        $this->cartItems = Cart::getCart();

        $this->item = array("producto" => $prod->getAttributes(), "cantidad" => $cantidad);
        
        if($this->productExistsInCart($prod)){
            $this->updateCart($prod, $cantidad);
            
        }else{
            $this->cartItems = Arr::prepend($this->cartItems, $this->item);
            $this->save();
        }
    }

    private function updateCart(Producto $prod, $cantidad){

        $cantidadTotal = $cantidad + $this->getItem($prod)['cantidad'];
        if(Producto::productoTieneStock($prod, $cantidadTotal)){
            
            $this->cartItem = Arr::pull($this->cartItems, array_search($this->item, $this->cartItems));
            $this->cartItem['cantidad'] = $cantidadTotal;
            
            $this->cantidad = $cantidadTotal;
            
            if($this->cantidad < 1){
                Cart::whereBelongsTo(Auth::user())->where('producto_id', $prod->id)->delete();
            }else{
                $this->cartItems = Arr::prepend($this->cartItems, $this->cartItem);
                Cart::whereBelongsTo(Auth::user())->where('producto_id', $prod->id)->update(['cantidad' => $this->cantidad]);
            }
            
            $this->fireModelEvent('updating');

        }else{
            throw new NoMoreStockException("No hay mas stock para este producto");
        }
    }

    public function getItem($prod){

        return Arr::get($this->cartItems,array_search($prod->id, data_get($this->cartItems, '*.producto.id')));
    }

    private function productExistsInCart(Producto $prod){

        foreach($this->cartItems as $productInCart){

            if(Arr::get($productInCart, 'producto.id') == $prod->id){
                return true;
            }
        }
        return false;
    }

    public function producto(){
        return $this->belongsTo(Producto::class);
    } 

    public static function getCart(){

        $carrito = array();
        //dd(session('cart_items'));
        if(session('cart_items') !== null){
            $carrito = session('cart_items');
        }else if(Cart::whereBelongsTo(Auth::user())->exists()) {

            $carritoCollection = Cart::whereBelongsTo(Auth::user())->with(['producto'])->get();

            foreach($carritoCollection as $carritoItems){
                $item = array("producto" => $carritoItems->producto->getAttributes(), "cantidad" => $carritoItems->cantidad);
                $carrito = Arr::prepend($carrito, $item);
            }
            
        }
        return !count($carrito) ? array(): $carrito;
    }

    public function user(){
        
        return $this->belongsTo(User::class);
    }
}
