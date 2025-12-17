<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddressController;

/**Route to add a new address */
Route::post("/address/new", [AddressController::class, 'newAddress']);
