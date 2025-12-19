<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddressController;


/**Route to add a new address */
Route::post("/address/new", [AddressController::class, 'newAddress']);
/**Route to get all addresses */
Route::get("/addresses", [AddressController::class, 'getAddresses']);
/**Route to update an address */
Route::put("/address/{id}", [AddressController::class, 'updateAddressDetails']);
/**Route to delete an address */
Route::delete("/address/{id}", [AddressController::class, 'deleteAddressById']);
/**Route to mark student as is deleted true */
Route::delete("/address/deleted", [AddressController::class, 'markIsdeletedTrue']);
/**Route to mark student as is deleted false */
Route::put("/address/delete", [AddressController::class, 'markIsdeletedFalse']);
