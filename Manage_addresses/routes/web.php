<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddressController;

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

// Route::get('/', function () {
//     return view('index');
// });
// Route::middleware('auth')->group(function () {
//     Route::get('/addresses', [AddressController::class, 'index'])->name('address.index');
//     Route::post('/addresses/store', [AddressController::class, 'store'])->name('address.store');
// });
Route::get('/', [AddressController::class, 'index'])->name('address.index');
Route::post('/address/new', [AddressController::class, 'newAddress'])->name('address.new');
Route::put('/address/{id}', [AddressController::class, 'updateAdress'])->name('address.update');
Route::delete('/address/{id}', [AddressController::class, 'deleteAdressById'])->name('address.delete');
