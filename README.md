//5031 7557 3453 0604
//5031 7557 3453 0604
//5031 7557 3453 0604
//11/25

sacar headlesss

ROLES -> Un usuario puede tener varios roles

guardar un json de permisos (abilities)

VOLVER A ASIGNAR VerifyCsrfToken para las RUTAS

https://www.youtube.com/watch?v=Tfx_eRCEOyk


-subirlo en docker??

-Hashear pass en front y pasarla al backend hasheada 

(->ValidarID en modelo y tirar exception desde el controlador ? ? ??)

Primero migrate

y despues

php artisan migrate:fresh
php artisan db:seed
php artisan passport:client --personal
PubGamer

copiar el primer par en .env y luego hacer esto:
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan config:cache
php artisan route:cache
php artisan optimize

UNSIGNEDINTEGER

-Borrar evento RoleDelted ??

-cambiar Auth::user() por $request->user() en controladores

//Validar respuesta_id que exista cuando respondes un comment

//Notificacion en el navegador estado pedido/respuesta

-Deshabilitar timestamp para algunas tablas

-Avisar cuando termina la sesion

Al updatear un carrito hacer api/carrito/ y pasarle la SESSION de la cookie
si no funciona no usar /api/ (no usar apis para interactuar con el carrito)
y sacar de kernel.php => 'api' el middleware de Session

Evento refresh token cuando se borra ROL

los saltos de liena dan cringe

-cambiar marca por 'fabricante'
-notificaciones del estado del pedido en tiempo real
-busqueda por tags #3200mhz





//Comentarios
>https://appdividend.com/2022/03/01/create-comment-nesting-in-laravel/

//Seguridad

>https://www.esparkinfo.com/laravel-security-practices.html#

CAMBIAR CV  A PDF CON PLANTILLA lul


curl -X POST \
-H "Content-Type: application/json" \
-H 'Authorization: Bearer TEST-5046947430241350-031622-6053b03ec3e853d6bd91b1718212d911-294987097' \
"https://api.mercadopago.com/users/test_user" \
-d '{"site_id":"MLA"}'


VENDEDOR

    147{"id":1091168012,"nickname":"TESTAM2G49JL","password":"qatest9689","site_status":"active","email":"test_user_12717250@testuser.com"}

COMPRADOR

    146{"id":1091189661,"nickname":"TETE9806143","password":"qatest515","site_status":"active","email":"test_user_4188743@testuser.com"}


Iterar en cada producto
    para cada producto fijarme que CATEGORIA es y chequear que si no existe en menu,
        si no existe pushear a menu, si existe fijarme si existe SUBCATEGORIA,
            si no existe pushear a menu, si existe pushear producto

            foreach($listaCategorias as $categoria){
            $categoria->label = $categoria->nombre;
            $arraySubCategoria = [];
            foreach($categoria->subcategoria as $subcategoria){
                $menuSubCategoria = new stdClass();
                $menuSubCategoria->label = $subcategoria->nombre;
                $menuSubCategoria->items = [];
                $prodsPorCatego = Producto::getProductosBySubcategoria($listaProductos, $subcategoria->nombre);
                foreach($prodsPorCatego as $prod){

                    $menuProducto = new stdClass();
                    $menuProducto->label = $prod->nombreProducto;
                    array_push($menuSubCategoria->items, $menuProducto);
                }
                array_push($arraySubCategoria, $menuSubCategoria);
            }
            $categoria->items = $arraySubCategoria;

            $categoriaMenu = new StdClass();
            $categoriaMenu->label = $categoria->label;
            $categoriaMenu->items = $categoria->items;
            array_push($menu, $categoriaMenu);
        }

USAR $store para usuario o  usar pages()

Usar Inertia::show en web.php

Libreria Bootstrap-Icons ocupa 1mb por solamente el uso de un icono

>En la vista publicacion mostrar la comparacion con los otros con el mismo TAG
>Comentarios del producto
>Reseñas del producto

>Dashboard mostrar Slider + los ultimos productos comprados, las rebajas, las ultimas reseñas

poner varios imagenes en el formulario registro y que aparezcan random

perdi la batalla contra inertia; la unica solucion para que funcione con CSRF es intentar que funcione con axios

SETEAR .env.example

SASS

aclarar y oscurecer colores 
lighten(red, 25%)
darken

@mixin background($col)
    background-color: $col

@include background(red)
