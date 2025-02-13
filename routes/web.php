<?php

use App\Http\Controllers\mahasiswaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//----------------------------------------------------------------------------------------------------------
//Acara 3
Route::get('/', function () {
    return view('welcome');
});

Route::resource('mahasiswa', mahasiswaController::class);
//----------------------------------------------------------------------------------------------------------
//2. Metode Router yang tersedia
Route::match(['get', 'post'], '/', function () {
    return 'ini match';
});
Route::any('/', function () {
    return 'ini any';
});
//----------------------------------------------------------------------------------------------------------
//3. CSRF => views/mahasiswa/create.blade.php

//----------------------------------------------------------------------------------------------------------
//4. Redirect Route
Route::redirect('/here', '/there');
Route::redirect('/here', '/notFound', 301);
//----------------------------------------------------------------------------------------------------------
//5. Route View
Route::view('/user', 'mahasiswa.create');
//----------------------------------------------------------------------------------------------------------
//6. Parameter Opsional
Route::get('/user/{name?}', function ($name = null){
    return $name;
});
Route::get('/user/{name?}', function ($name = 'John'){
    return $name;
});
//----------------------------------------------------------------------------------------------------------
//7. Regular Expression Contrains
Route::get('user/{name}', function($name){

})->where('name', '[A-Za-z]+');
Route::get('user/{id}', function($id){

})->where('name', '[0-9]+');
Route::get('user/{id}/{name}', function($id,$name){

})->where(['id'=> '[0-9]+','name'=> '[a-z]+']);
//----------------------------------------------------------------------------------------------------------
//8. Global Contrains => app/Models/Providers/RouteServiceProvider.php
Route::get('user/{id}',function ($id){
// Only executed if {id} is numeric....
});
//----------------------------------------------------------------------------------------------------------
//9. Encoded Forward Slashes
Route::get('search/{search}', function ($search){
    return $search;
});
//----------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------
// //Acara 4
// //1. Generate URL ke Route Bernama
// $url = route('profile');
// return redirect()->route('profile');

// Route::get('user/{id}/profile',function ($id){

// })-> name('profile');
// $url = route('profile', ['id'=> 1]);

// Route::get('user/{id}/profile', function ($id){

// })->name('profile');
// $url = route('profile', ['id'=>1, 'photos'=> 'yes']);
// //----------------------------------------------------------------------------------------------------------
// //Memeriksa Rute Saat ini ->app/Http/mahasiswaController.php(function handle)
// //----------------------------------------------------------------------------------------------------------
// //3.Middleware
// Route::middleware(['first', 'second'])->group(function(){
//     Route::get('/', function(){
//         //Use first & second Middleware
//     });
//     Route::get('user/profile', function(){
//         //Use first & second Middleware
//     });
// });
// //----------------------------------------------------------------------------------------------------------
// //4. Namespaces
// Route::namespace('Admin')->group(function(){
//     // Controller Within The "App\Http\Controllers\Admin" Namespace
// });
// //----------------------------------------------------------------------------------------------------------
// //5. Subdomain Routing
// Route::domain('{account}.myapp.com')->group(function(){
//     Route::get('user/{id}', function ($account, $id){

//     });
// });
// //----------------------------------------------------------------------------------------------------------
// //6. Route Prefixes
// Route::prefix('admin')->group(function(){
//     Route::get('users', function(){
//         // Matches The "/admin/users" URL
//     });
// });
// //----------------------------------------------------------------------------------------------------------
// //7. Route Name Prefixes
// Route::name('admin.')->group(function(){
//     Route::get('users', function (){
//     })->name('users');
// });
// //----------------------------------------------------------------------------------------------------------
// Route::get('/profile', function () {
//     return view('mahasiswa.index');
// })->name('profile');
