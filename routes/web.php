<?php

use App\Models\Role;
use App\Models\User;
use App\Models\Zone;
use App\Models\Image;
use App\Models\Space;
use App\Models\Island;
use App\Models\Address;
use App\Models\Comment;
use App\Models\Service;
use App\Models\Modality;
use App\Models\SpaceType;
use App\Models\Municipality;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//RUTAS DE PRUEBA PARA VER EL FUNCIONAMIENTO DE RUTAS

// Route::get('/hola', function () {
//     return 'Hola Mundo Cruel';
// });

// Con el navegador abrir la URL 
// http://<example-app>.test/hola

// Mejorarlo con los siguiente y recargar la página
// Route::get('/hola',function() {
//     return '<h1>Hola Mundo Cruel</h1>';
// });

// Route::get('/index.html',function() {

//     $html_code = "<!DOCTYPE html>
//                     <html>
//                     <head>
//                         <title>Laravel</title>
//                     </head>
//                     <body>
//                         <h1>I love Laravel</h1>
//                     </body>
//                     </html>"; 

//     return $html_code;
// }); 

//Ejemplo de Route con un parámetro en la URI
Route::get('/hola/{nom}',function($nom) {
    return '<h1>Hola '.$nom.' estás en un Mundo Cruel</h1>';
})->name('holanom');  // Veremos esto más adelante, es un alias

// http://example-app.test/hola/Tomeu

// A veces, el parámetro será opcional
// Route con dos parámetros, uno de ellos opcional con valor por defecto

Route::get('/hola/{nom}/{professio?}',function($nom, $professio = null) {
	return '<h1>Hola '.$nom.' que eres '.$professio.' estás en un Mundo Cruel</h1>';
})->name('nomprof'); // Veremos esto más adelante, es un alias

// // Llamarlo mediante
// http://<example-app.test>/hola/Tomeu/profesor
// http://<example-app.test>/hola/Tomeu/mecanico
// http://<example-app>.test/hola/Tomeu/

// El ejemplo solamente acepta letras 
// Route::get('/hola/{nom}',function($nom) {
//     return '<h1>Hola '.$nom.' estás en un Mundo Cruel</h1>';
// })->where('nom','[A-Za-z]+');  // podemos poner whereAlpha('nom');

// Con restricciones podemos poner plantillas o patterns
// 	las plantilla se crea en app>Providers>AppServiceProvider.php y lo aplica POR TODO

// En routes>web
// Route::get('/perfil/{id}',function($id) { // Route condicionada por plantilla 
//     return '<h3>Perfil Nº'.$id.'</h3>'; 
// });

// Creamos una Route con restricció en nombre (solo aceptará caracteres) 
// Creamos Route con un alias (toda la ruta es un alias)

// La Route completa 'http://<example-app.test>/holanueva' ahora tiene un alias 
//	este alias se denomina 'salutacio'
Route::get('/holanueva',function() {
    return '<h1>Hola Nueva</h1>';
})->name('salutacio'); // Alias, se usará más adelante

// Creamos una Route con un enlace insertado de manera manual
// 	recordar que el {id} sigue afectado por la restricción definida en app>Providers>AppServiceProvider 
Route::get('/perfilr1/{id}',function($id) {
    return "<h3>Perfil Nº ".$id."<a href='/holanueva'>saluda a </a></h3>"; 
}); 

// Podemos simplificar la route utilizando el alias definido anteriormente
Route::get('/perfilr2/{id}',function($id) {
    return "<h3>Perfil Nº ".$id."<a href='".route('salutacio')."'>saluda a </a></h3>"; 
}); 

// Estos alias son útiles cuando estamos usando rutas complejas 
// Se facilita el control de las rutas mediante el renombrado 
Route::get('/lñajalkjasljkasflkjasfd',function() {
    return '<h1>Hola de nuevo, ruta rara es lñajalkjasljkasflkjasfd</h1>';
})->name('rutarara'); 

Route::get('/perfilr3/{id}',function($id) {
    return "<h3>Perfil Nº".$id."<a href='".route('rutarara')."'>saluda</a></h3>"; 
});

// La llamada a la Route se hará con un parámetro
// 	el parámetro se incluye mediante una array asociativo
Route::get('/perfilr4/{id}',function($id) {
    return "<h3>Perfil Nº".$id."<a href='".route('holanom',['nom'=>'Tommy'])."'>saluda</a></h3>"; 
});

// Ejemplo con varios parámetros (mediante un array asociativo)
Route::get('/perfilr5/{id}',function($id) {
    return "<h3>Perfil Nº".$id."<a href='".route('nomprof',['nom'=>'Tommy', 'professio'=>'Rascador de webos'])."'>saluda</a></h3>"; 
});

// Definamos una agrupación: 
// En este caso la ruta tiene un prefijo y la correcta será 'admin/hola'
// Es bueno para aplicar redirección genérica de rutas (middleware, prefijos, subdominios, etc.) 

Route::group(['prefix'=>'admin', 'as' => 'admin.'], function() {
    
    Route::get('/hola/{nom}',function($nom) {
        return '<h1>Hola '.$nom.' es agrupación</h1>';
    })->name('saluda'); //dando nombre a la ruta, ya la tomará de manera correcta '/admin/hola'

    Route::get('/usuari/{nom}', function ($nom) {
        return '<h1>Hola '.$nom.' es agrupación</h1>';
    })->name('user'); 
});

// Usando redirección con agrupación
// Observa como está redireccionada correctamente usando el alias de la ruta
Route::get('/redireccion',function() {
    return "<h3>Perfil Nº <a href='".route('admin.saluda',['nom'=>'Tommy'])."'>saluda</a></h3>"; 
}); 

Route::get('/usuaris/{usuari}', function(User $usuari){
    return $usuari; 
}); 

Route::get('/space/{space}', function(Space $space){
    return $space; 
});

// Otro ejemplo con el Model Modalities 
Route::get('/modalities/{modality}', function(Modality $modality){
    return $modality; 
});

Route::get('/addresses/{address}', function(Address $address){
    return $address; 
}); 

Route::get('/comments/{comment}', function(Comment $comment){
    return $comment; 
}); 

Route::get('/images/{image}', function(Image $image){
    return $image; 
}); 

Route::get('/islands/{island}', function(Island $island){
    return $island; 
}); 

Route::get('/modalities/{modality}', function(Modality $modality){
    return $modality; 
}); 

Route::get('/municipalities/{municipality}', function(Municipality $municipality){
    return $municipality; 
}); 

Route::get('/roles/{role}', function(Role $role){
    return $role; 
});

Route::get('/services/{service}', function(Service $service){
    return $service; 
});

Route::get('/spacetypes/{spacetype}', function(SpaceType $spacetype){
    return $spacetype; 
});

Route::get('/zones/{zone}', function(Zone $zone){
    return $zone; 
});





// http://<blog-app.test>/admin/hola/tomeu
// http://<blog-app.test>/admin/usuari/tomeu


require __DIR__.'/auth.php';
