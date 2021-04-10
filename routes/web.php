<?php

use App\Http\Controllers\Cliente;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\CssSelector\Node\FunctionNode;


/*Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function() {
   echo "kkkkkkkkkkkkkkk";
});*/

/*Route::middleware([])->group(function (){
    Route::get('/posts',[PostController::class,'index'])->name('posts.index');

}); */

/** Middleware de autorização das rotas */
Route::group(['middleware' => ['auth']], function () {
// Exemplo de Controlar grupos e middleware

    Route::group(['middleware' => ['check.teste'],
                //'namespace' => 'Admin', 
                'prefix' => 'admin'],
                function() {

                
                    Route::any('/posts/search',[PostController::class,'search'])->name('posts.search');
                    /*Route::get('/posts',[PostController::class,'index'])->name('posts.index');
                    Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');
                    Route::put('/posts/{id}',[PostController::class,'update'])->name('posts.update');
                    Route::get('/posts/edit/{id}',[PostController::class,'edit'])->name('posts.edit');
                    Route::delete('/posts/{id}',[PostController::class,'destroy'])->name('posts.destroy');
                    Route::get('/posts/{id}',[PostController::class,'show'])->name('posts.show');
                    Route::post('/posts',[PostController::class,'store'])->name('posts.store');*/
                    

                /*Route::get('/clientes',[ClienteController::class,'index'])->name('clientes.index'); 
                Route::get('/clientes/create',[ClienteController::class,'create'])->name('clientes.create'); 
                Route::post('/clientes',[ClienteController::class,'store'])->name('clientes.store'); 
                Route::put('/clientes/{id}',[ClienteController::class,'update'])->name('clientes.update');
                Route::get('/clientes/edit/{id}',[ClienteController::class,'edit'])->name('clientes.edit');*/
                Route::resource('/posts',PostController::class);
                //Route::resource('/clientes',ClienteController::class);
    });


    Route::group(['middleware' => ['check.teste'],
                //'namespace' => 'Admin', 
                'prefix' => 'vendas'],
                function() {

                
                    /*Route::get('/posts',[PostController::class,'index'])->name('posts.index');
                    Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');
                    Route::put('/posts/{id}',[PostController::class,'update'])->name('posts.update');
                    Route::get('/posts/edit/{id}',[PostController::class,'edit'])->name('posts.edit');
                    Route::delete('/posts/{id}',[PostController::class,'destroy'])->name('posts.destroy');
                    Route::get('/posts/{id}',[PostController::class,'show'])->name('posts.show');
                    Route::post('/posts',[PostController::class,'store'])->name('posts.store');*/
                    

                /*Route::get('/clientes',[ClienteController::class,'index'])->name('clientes.index'); 
                Route::get('/clientes/create',[ClienteController::class,'create'])->name('clientes.create'); 
                Route::post('/clientes',[ClienteController::class,'store'])->name('clientes.store'); 
                Route::put('/clientes/{id}',[ClienteController::class,'update'])->name('clientes.update');
                Route::get('/clientes/edit/{id}',[ClienteController::class,'edit'])->name('clientes.edit');*/
                //Route::resource('/posts',PostController::class);
                Route::resource('/clientes',ClienteController::class);
    });


});

//Route::resource('/clientes','App\Http\Controllers\ClienteController');
Route::get('/', function () {
    return view('welcome');
});

Route::get('/ola',function(){
    echo "OLÁ MUNDO DO LARAVEL 8";

});

Route::get('/login',function(){
    return 'login';

})->name('login');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



require __DIR__.'/auth.php';


   

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
