@extends('layouts.layout_navig')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/styles_product.css') }}">
    <div class="p-5 text-center bg-body-tertiary">
        <div class="container py-5">
            <div class="d-flex flex-column align-items-center">
                <h1 class="text-body-emphasis"> {{$product->title}}</h1>
                <p class="col-lg-8 mx-auto lead">
                   {{$product->description}}
                </p>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row">
            <div class="col-md-6">
                <p class="cena">Cena: {{$product->price}} $</p>
                <p class="kraj">Kraj: {{$product->kraj}} </p>
                <p class="category">Category: {{$product->category}} </p>
            </div>
            <div class="col-md-6">
                <div class="gallery">
                    <div class="slider">
                        <div class="slide"><img src="{{ asset('images/moto.png') }}" alt="Image 1"/></div>
                        <div class="slide"><img src="{{ asset('images/animal.png') }}" alt="Image 2"></div>
                        <div class="slide"><img src="{{ asset('images/sport.png') }}" alt="Image 3"></div>
                    </div>
                    <button id="prev">Previous</button>
                    <button id="next">Next</button>
                </div>
            </div>
        </div>
    </div>
    <div>
        <a href="/edit_product/{{$product->id}}">
            <p class="edit">Edit</p>
        </a>

    </div>
@endsection
