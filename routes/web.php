<?php

use App\Http\Controllers\Cliente;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ClienteTelefoneController;
use App\Http\Controllers\ManyToManyController;
use App\Http\Controllers\OneToManyController;
use App\Http\Controllers\OneToOneController;
use App\Http\Controllers\PolimorphicController;
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


// Testando relação de  uma para um tabela Countries relacionado com Location com latitude e longitude
Route::get('/one-to-one',[OneToOneController::class,'oneToOne']);
Route::get('/one-to-one-inverse',[OneToOneController::class,'oneToOneInverse']);
Route::get('/one-to-one-insert',[OneToOneController::class,'oneToOneInsert']);

/*

* One To MAny -- um para Muitos relacionamentos rota
Route::get('/one-to-many-insert',[OneToManyController::class,'oneToMany']);
*/
Route::get('/one-to-many',[OneToManyController::class,'oneToMany']);
Route::get('/one-to-many-two',[OneToManyController::class,'oneToManyTwo']);
Route::get('/one-to-many-insert',[OneToManyController::class,'oneToManyInsert']);
Route::get('/one-to-many-insert-two',[OneToManyController::class,'oneToManyInsertTwo']);


/* Has many Through -- 

* Has many Through -- Uma  hasManyThrough relação estabelece 
 uma conexão muitos para muitos com outro modelo.
  Essa relação indica que o modelo declarante pode ser
   combinado com zero ou mais instâncias de outro modelo,
 procedendo-se por meio de um terceiro modelo. Nesse casso vamos recuperar 
 as cidades de um País  pulando o relacionamento de Estados apenas indicando 
 o relacionamento na Model de State

*/
Route::get('/has-many-through',[OneToManyController::class,'hasManyThrough']);

Route::get('/many-to-many',[ManyToManyController::class,'manyToMany']);
Route::get('/many-to-many-inverse',[ManyToManyController::class,'manyToManyInverse']);
Route::get('/many-to-many-insert',[ManyToManyController::class,'manyToManyInsert']);

/*

* Many To many-- esse  relacionamento é de muitos estados apenas para um país o teste 
Route::get('/one-to-many-insert',[OneToManyController::class,'oneToMany']);
*/
Route::get('/many-to-one',[OneToManyController::class,'manyToOne']);
Route::get('/clientes-telefones',[ClienteTelefoneController::class,'clientesTelefones']);


/* Polymorphi -- 

* Polymorphi--  Relacionamentos Polymorphic é um relacionamento mais complexo
No nosso cenário vamos criar uma tabea auxiliar de comentários centralizada para guardar comentários
tanto de cidades , estados e países . Com o relaciomento polymorphic d laravel centralizar a
responsabilidade em uma única tabela e com o relacionamento Polymorphic já consegue relacionar para diversars 
tabelas que possuem comentários entralizar apenas em uma tabela auxiliar.
*/

Route::get('/polymorphic',[PolimorphicController::class,'polymorphic']);
Route::get('/polymorphic-insert',[PolimorphicController::class,'polymorphicInsert']);
Route::get('/polymorphic-insert',[PolimorphicController::class,'polymorphicInsert']);



Route::get('/login',function(){
    return 'login';

})->name('login');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



require __DIR__.'/auth.php';


   

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
