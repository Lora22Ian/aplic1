<?php
//dd(class_exists('App\Http\Controllers\TaskController'));
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
// Route::group(['middleware' => 'auth'], function(){
// // Route::get('/', function () {
// //     return view('welcome');
// // });
// // Route::get('/', 'TaskController@index'); //afisare lista sarcini pe pagina de start
// // Route::resource('tasks', 'TaskController');// Ruta de resurse va genera CRUD URI
// Route::get('/', [TaskController::class, 'index']);
// Route::resource('tasks', TaskController::class);// Ruta de resurse va genera CRUD URI
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [TaskController::class, 'index']);
    Route::resource('tasks', TaskController::class);// Ruta de resurse va genera CRUD URI  
});
Route::get('/', [ProductsController::class, 'index']); //afisare pagina de start
Route::get('cart', [ProductsController::class, 'cart']); //cos
Route::get('add-to-cart/{id}', [ProductsController::class, 'addToCart']);//adaug in cos
Route::patch('update-cart', [ProductsController::class, 'update']); //modific cos
Route::delete('remove-from-cart', [ProductsController::class, 'remove']);//sterg din cos

    

