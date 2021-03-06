<?php
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('frontend.index');
});



// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth', 'isAdmin'])->group(function () {
    //isAdmin is from the kernel.php where we registered the middleware


    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

});