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
    /**Function to Get all addresses */
    public function getAddresses()
    {
        try {
            $addresses = Address::where([["is_deleted", false]])->get();
            return response()->json([
                "status" => "success",
                "status_code" => 200,
                "message" => "Addresses retrieved successfully",
                "data" => $addresses
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
    /**Function to update an address */
    public function updateAddressDetails(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "id" => "required",
            ]);
            if ($validator->fails()) {
                return response()->json([
                    "status" => "failure",
                    "status_code" => 400,
                    "message" => "Validation Error",
                    "errors" => $validator->errors()
                ]);
            }
            $address = Address::where([["id", $request->id]])->first();
            if (!$address) {
                return response()->json([
                    "status" => "failure",
                    "status_code" => 404,
                    "message" => "Address not found",
                    "data" => []
                ]);
            }
            if ($request->has('name')) {
                $address->name = $request->name;
            }
            if ($request->has('mobile')) {
                $address->mobile = $request->mobile;
            }
            if ($request->has('address')) {
                $address->address = $request->address;
            }
            if ($request->has('city')) {
                $address->city = $request->city;
            }
            if ($request->has('state')) {
                $address->state = $request->state;
            }
            if ($request->has('pincode')) {
                $address->pincode = $request->pincode;
            }
            if ($request->has('type')) {
                $address->type = $request->type;
            }
            $address->save();

            return response()->json([
                "status" => "success",
                "status_code" => 200,
                "message" => "Address details updated successfully",
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
    /**Function to delete an address */
    public function deleteAddressById(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "id" => "required",
            ]);
            if ($validator->fails()) {
                return response()->json([
                    "status" => "failure",
                    "status_code" => 400,
                    "message" => "Validation Error",
                    "errors" => $validator->errors()
                ]);
            }
            $address = Address::where([["id", $request->id]])->first();
            if (!$address) {
                return response()->json([
                    "status" => "failure",
                    "status_code" => 404,
                    "message" => "Address not found",
                    "data" => []
                ]);
            }
            $address->delete();
            return response()->json([
                "status" => "success",
                "status_code" => 200,
                "message" => "Address deleted successfully",
                "data" => []
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
    /**Function to markIsDeleted true */
    public function markIsdeletedTrue(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "id" => "required",
            ]);
            if ($validator->fails()) {
                return response()->json([
                    "status" => "failure",
                    "status_code" => 400,
                    "message" => "Validation Error",
                    "errors" => $validator->errors()
                ]);
            }
            $address = Address::where([["id", $request->id]])->first();
            if (!$address) {
                return response()->json([
                    "status" => "failure",
                    "status_code" => 404,
                    "message" => "Address not found",
                    "data" => []
                ]);
            }
            $address->is_deleted = true;
            $address->save();
            return response()->json([
                "status" => "success",
                "status_code" => 200,
                "message" => "Address marked as deleted successfully",
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
    /**Function to markIsDeleted false */
    public function markIsdeletedFalse(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "id" => "required",
            ]);
            if ($validator->fails()) {
                return response()->json([
                    "status" => "failure",
                    "status_code" => 400,
                    "message" => "Validation Error",
                    "errors" => $validator->errors()
                ]);
            }
            $address = Address::where([["id", $request->id]])->first();
            if (!$address) {
                return response()->json([
                    "status" => "failure",
                    "status_code" => 404,
                    "message" => "Address not found",
                    "data" => []
                ]);
            }
            $address->is_deleted = false;
            $address->save();
            return response()->json([
                "status" => "success",
                "status_code" => 200,
                "message" => "Address marked as not deleted successfully",
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
