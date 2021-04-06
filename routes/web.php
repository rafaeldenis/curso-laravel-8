<?php

use App\Http\Controllers\Cliente;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\CssSelector\Node\FunctionNode;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/ola',function(){
    echo "OLÁ MUNDO DO LARAVEL 8";

});

Route::get('/posts',[PostController::class,'index'])->name('posts.index');
Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');
Route::post('/posts',[PostController::class,'store'])->name('posts.store');

Route::get('/clientes',[Cliente::class,'index']); 
Route::get('/clientes/create',[Cliente::class,'index'])->name('clientes.create'); 
Route::post('/clientes',[Cliente::class,'store'])->name('clientes.store'); 


