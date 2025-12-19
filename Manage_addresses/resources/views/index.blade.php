@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-3">Saved Addresses</h3>

    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addressModal">
        + Add New Address
    </button>

    @if($addresses->count() == 0)
    <p class="text-muted">No address found</p>
    @else
    <div class="row">
        @foreach($addresses as $address)
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <strong>{{ $address->name }}</strong><br>
                    {{ $address->address }}<br>
                    {{ $address->city }}, {{ $address->state }}<br>
                    {{ $address->pincode }}<br>
                    📞 {{ $address->mobile }}<br>
                    <span class="badge bg-secondary">{{ $address->type }}</span>

                    <div class="mt-2">
                        <button class="btn btn-sm btn-warning" onclick='editAddress(@json($address))'>
                            Edit
                        </button>

                        <button class="btn btn-sm btn-danger" onclick="deleteAddress({{ $address->id }})">
                            Delete
                        </button>


                    </div>
                </div>

            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>

{{-- Add Address Modal --}}
<div class="modal fade" id="addressModal">
    <div class="modal-dialog">
        <form id="addressForm" method="POST" action="{{ route('address.new')}}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Add New Address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <input class="form-control mb-1" name="name" id="name" placeholder="Full Name">
                    <small class="text-danger" id="error-name"></small>

                    <input class="form-control mb-1 mt-2" name="mobile" id="mobile" placeholder="Mobile Number">
                    <small class="text-danger" id="error-mobile"></small>

                    <textarea class="form-control mb-1 mt-2" name="address" id="address" placeholder="Address"></textarea>
                    <small class="text-danger" id="error-address"></small>

                    <input class="form-control mb-1 mt-2" name="city" id="city" placeholder="City">
                    <small class="text-danger" id="error-city"></small>

                    <input class="form-control mb-1 mt-2" name="state" id="state" placeholder="State">
                    <small class="text-danger" id="error-state"></small>

                    <input class="form-control mb-1 mt-2" name="pincode" id="pincode" placeholder="Pincode">
                    <small class="text-danger" id="error-pincode"></small>

                    <select name="type" id="type" class="form-control mb-1 mt-2">
                        <option value="">Select Type</option>
                        <option value="home">Home</option>
                        <option value="work">Work</option>
                    </select>
                    <small class="text-danger" id="error-type"></small>
                    <form id="addressForm">
                        <button id="submitBtn" class="btn btn-success">Save Address</button>
                    </form>

                </div>
            </div>
        </form>
    </div>
</div>
<script src="{{ asset('js/edit.js') }}"></script>
<script src="{{ asset('js/create.js') }}"></script>
<script src="{{ asset('js/delete.js') }}"></script>



@endsection
