@extends('layouts.web')

@section('include')

<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/home.css?'.time().'') }}">

@endsection

@section('main')
<?php
$path = storage_path() . "/json/country.json";

$json = json_decode(file_get_contents($path), true); 

?>
<!-- Modal -->
<div class="modal fade" id="editModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                <div class="address-container">
                    <div>
                        <input type="text" name="contact_name" placeholder="Full Name">
                    </div>
                    <div>
                        <input type="text" name="phone_number" placeholder="Phone Number">
                    </div>
                    <div>
                        <input type="text" name="address" placeholder="Street">
                    </div>
                    <div>
                        <input type="text" name="unit" placeholder="Apartments, Units, Etc">
                    </div>
                    <div>
                        <select name="country" class="edit_country">
                            @foreach(array_column($json,'name') as $key => $value)
                            <option id="{{ $key }}" value="{{ $json[$key]['name'] }}">{{ ($json[$key]['name']) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <span class="spr">
                            <input type="text" name="spr" placeholder="State/Province/Region">
                        </span>
                    </div>
                    <div>
                        <input type="text" name="city" placeholder="City">
                    </div>
                    <div>
                        <input type="text" name="zipcode" placeholder="Zip code">
                    </div>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary save_change">Save Change</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="add_address" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                <div id="adding_address" class="address-container">
                    <div>
                        <input type="text" name="contact_name" placeholder="Full Name">
                    </div>
                    <div>
                        <input type="text" name="phone_number" placeholder="Phone Number">
                    </div>
                    <div>
                        <input type="text" name="address" placeholder="Street">
                    </div>
                    <div>
                        <input type="text" name="unit" placeholder="Apartments, Units, Etc">
                    </div>
                    <div>
                        <select name="country">
                            @foreach(array_column($json,'name') as $key => $value)
                            <option id="{{ $key }}" value="{{ $json[$key]['name'] }}">{{ ($json[$key]['name']) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <span class="spr">
                            <span class="spr">
                             <select name="spr" class="spr-select">
                            @foreach($json[0]['states'] as $key => $value)
                                <option id="{{ $key }}" value="{{ $value }}">{{ $value }}</option>
                            @endforeach
                            </select>
                        </span>
                        </span>
                    </div>
                    <div>
                        <input type="text" name="city" placeholder="City">
                    </div>
                    <div>
                        <input type="text" name="zipcode" placeholder="Zip code">
                    </div>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary add_address_btn">Add Address</button>
      </div>
    </div>
  </div>
</div>

<div class="home-container">

    <div class="dashboard-container">
        <div><b>My Account</b></div>
        <hr>
        @if($user)
        <div>{{ $user->name }}</div>
        <div>{{ $user->email }}</div>
        @endif
        <a href="{{ url('wishlist') }}"><button class="view_wishlist">View Wish List</button></a>
        <a href="{{ url('orders') }}"><button class="view_orders">View Orders</button></a>
        
        <div class="addresses-container">
            <div class="address-list">
                <div class="border-address adding" data-toggle="modal" data-target="#add_address">
                    Add New Shipping Address
                </div>
            @foreach($addresses as $address)
                <div id="{{ $address->id }}" class="border-address">
                    <span>{{ $address->contact_name }}</span> 
                    <br>
                    <span>{{ $address->address }}</span> 
                    <br>
                    <span>{{ $address->city }}</span>, <span>{{ $address->spr}}</span> <span>{{ $address->zipcode }}</span>
                    <br> 
                    <span>{{ $address->phone_number }}</span> 
                    <br>
                    <span>{{ $address->country }}</span> 
                    <div>
                        <button id="{{ $address->id }}" type="button" class="btn address_edit" data-toggle="modal" data-target="#editModalCenter">Edit</button>
                        <button id="{{ $address->id }}" type="button" class="address_delete">Delete</button>
                    </div>
                </div>
            @endforeach
            <div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script type="text/javascript" src="{{ URL::asset('js/home.js?'.time().'') }}"></script>

@endsection
