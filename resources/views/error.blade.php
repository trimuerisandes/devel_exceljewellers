@extends('layouts.web')

@section('include')

<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/home.css?'.time().'') }}">

@endsection

@section('main')
<div class="error-container">
    <div class="error-msg">Oops. This Page Cannot Be Found! 404</div>
    <hr>
    <div class="helpful-container">
        <div>Helpful Links</div>
        <ul>
            <li><a href="{{ url('/')}}">Home</a></li>
            <li><a href="{{ url('/engagement-ring')}}">Engagement Rings</a></li>
            <li><a href="{{ url('/wedding-band')}}">Wedding Bands</a></li>
            <li><a href="{{ url('/fine-jewellery')}}">Fine Jewellery</a></li>
            <li><a href="{{ url('/diamonds')}}">Diamonds</a></li>
        </ul>
    </div>
</div>

<style type="text/css">
    
    .error-container{
        max-width: 1000px;
        margin: auto;
        padding: 10px;
    }

    .error-msg{
        font-weight: bold;
        color:#d60d8c;
        font-size: 40px;
        text-align: center;
    }

    .helpful-container{
        text-align: center;
        padding: 30px;
    }

    .helpful-container div{
        color: #d60d8c;
        font-size: 20px;
    }

    .error-container ul{
        list-style: none;
        padding: 0px;
    }

    .error-container ul li{
        padding: 5px 0px;
        transition: .3s;
    }

    .error-container ul li:hover{
        color: #d60d8c;
    }

</style>
@endsection
