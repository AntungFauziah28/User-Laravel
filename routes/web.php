<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\UserController;
use App\Models\User;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['role:admin']], function()
{
    Route::controller(UserController::class)->group(function () {
        Route::get('user', 'index')->name('user.index');
        Route::post('user', 'store')->name('user.store');
        Route::get('user/edit/{id}', 'edit')->name('user.edit');
        Route::get('user/hapus/{id}', 'destroy');
        Route::put('user/update/{id}', 'update')->name('user.update');
    });

});