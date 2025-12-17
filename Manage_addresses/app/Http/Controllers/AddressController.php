<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;

class AddressController extends Controller
{
    public function newAddress(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'pincode' => 'required',
            'type' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                "status" => "failure",
                "status_code" => 400,
                "message" => "Validation Error",
                "errors" => $validator->errors()
            ]);
        }
        try {
            $address = new Address;
            $address->name = $request->name;
            $address->mobile = $request->mobile;
            $address->address = $request->address;
            $address->city = $request->city;
            $address->state = $request->state;
            $address->pincode = $request->pincode;
            $address->type = $request->type;
            $address->save();

            return response()->json([
                "status" => "success",
                "status_code" => 201,
                "message" => "Address added successfully",
                "data" => $address
            ]);
        } catch (Exception $e) {
            return response()->json([
                "status" => "failure",
                "status_code" => 500,
                "message" => "Server Error",
                "errors" => $e->getMessage()
            ]);
        }
    }
}
