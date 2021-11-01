@extends('layouts.web')
@section('page-title')
Excel Jewellers | Shopping Cart
@endsection
@section('include')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/cart.css?='.time().'') }}">
@endsection
@section('main')

<?php
$path = storage_path() . "/json/country.json"; // ie: /var/www/laravel/app/storage/json/filename.json

$json = json_decode(file_get_contents($path), true); 

?>
<div class="cart-container"></div>
<script type="text/javascript" src="{{ URL::asset('js/cart.js?='.time().'') }}"></script>
@endsection
