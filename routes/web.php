<?php

use App\Http\Controllers\mahasiswaController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\Backend\PengalamanKerjaController;
use App\Http\Controllers\Backend\PendidikanController;
use Illuminate\Support\Facades\Auth;



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

//----------------------------------------------------------------------------------------------------------
//2. Metode Router yang tersedia
// Route::match(['get', 'post'], '/', function () {
//     return 'ini match';
// });
// Route::any('/', function () {
//     return 'ini any';
// });
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
Route::get('/user/{name?}', function ($name = null) {
    return $name;
});
Route::get('/user/{name?}', function ($name = 'John') {
    return $name;
});
//----------------------------------------------------------------------------------------------------------
//7. Regular Expression Contrains
Route::get('user/{name}', function ($name) {})->where('name', '[A-Za-z]+');
Route::get('user/{id}', function ($id) {})->where('name', '[0-9]+');
Route::get('user/{id}/{name}', function ($id, $name) {})->where(['id' => '[0-9]+', 'name' => '[a-z]+']);
//----------------------------------------------------------------------------------------------------------
//8. Global Contrains => app/Models/Providers/RouteServiceProvider.php
Route::get('user/{id}', function ($id) {
    // Only executed if {id} is numeric....
});
//----------------------------------------------------------------------------------------------------------
//9. Encoded Forward Slashes
Route::get('search/{search}', function ($search) {
    return $search;
});
//----------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------
// Acara 4

// // 1. Generate URL ke Route Bernama
// Route::get('/profile/{id}', function ($id) {
//     return "Profil Pengguna dengan ID: " . $id;
// })->name('profile.show'); 
// //----------------------------------------------------------------------------------------------------------
// //Memeriksa Rute Saat ini ->app/Http/mahasiswaController.php(function handle)
// //----------------------------------------------------------------------------------------------------------
// //3.Middleware
// Route::middleware(['first', 'second'])->group(function () {
//     Route::get('/', function () {
//         //Use first & second Middleware
//     });
//     Route::get('user/profile', function () {
//         //Use first & second Middleware
//     });
// });
// //----------------------------------------------------------------------------------------------------------
// //4. Namespaces
// Route::namespace('Admin')->group(function () {
//     // Controller Within The "App\Http\Controllers\Admin" Namespace
// });
// //----------------------------------------------------------------------------------------------------------
// //5. Subdomain Routing
// Route::domain('{account}.myapp.com')->group(function () {
//     Route::get('user/{id}', function ($account, $id) {});
// });
// //----------------------------------------------------------------------------------------------------------
// //6. Route Prefixes
// Route::prefix('admin')->group(function () {
//     Route::get('users', function () {
//         // Matches The "/admin/users" URL
//     });
// });
// //----------------------------------------------------------------------------------------------------------
// //7. Route Name Prefixes
// Route::name('admin.')->group(function () {
//     Route::get('users', function () {})->name('users');
// });
//----------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------
//Acara 5
//Membuat controller mahasiswaController.php
//menambakan alamat url baru yang menghubungkan dengan mahasiswaController.php.
Route::resource('mahasiswa', mahasiswaController::class);
//----------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------
//Acara 6
//Membuat views di mahasiswa/index.blade.php
Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::resource('home', 'HomeController');
});
//----------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------
//Acara 8
Route::resource('/Dashboard', DashboardController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home');

//----------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------
//Acara 13-15
Route::group(['namespace' => 'App\Http\Controllers\Backend'], function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('pendidikan', PendidikanController::class);
    Route::resource('pengalaman_kerja', PengalamanKerjaController::class);
});

//----------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------
//Acara16
Route::get('/session/create', [SessionController::class, 'create']);
Route::get('/session/show', [SessionController::class, 'show']);
Route::get('/session/delete', [SessionController::class, 'delete']);

Route::get('/pegawai/{nama}', [PegawaiController::class, 'index']);

Route::get('/formulir', [PegawaiController::class, 'formulir']);
Route::post('/formulir/proses', [PegawaiController::class, 'proses']);

//----------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------
//Acara18
Route::get('/cobaerror/{nama?}', [CobaController::class, 'index']);

//----------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------
//Acara19
Route::get('/upload', [UploadController::class, 'upload'])->name('upload');
Route::post('/upload/proses', [UploadController::class, 'proses_upload'])->name('upload.proses');

Route::get('/upload', [UploadController::class, 'upload'])->name('upload');
Route::post('/upload/resize', [UploadController::class, 'resize_upload'])->name('upload.resize');

//----------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------
//Acara20
Route::get('/dropzone', [UploadController::class, 'dropzone'])->name('dropzone');
Route::post('/dropzone/store', [UploadController::class, 'dropzone_store'])->name('dropzone.store');
Route::get('/pdf_upload', [UploadController::class, 'pdf_upload'])->name('pdf.upload');
Route::post('/pdf/store', [UploadController::class, 'pdf_store'])->name('pdf.store');
