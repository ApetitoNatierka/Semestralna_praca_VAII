
@extends('layouts.layout')
@section('content')
<link rel="stylesheet" href="{{ asset('css/styles_products.css') }}">
@for($i = 0; $i < count($products); $i++)
    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
        <div class="col">
            <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg position-relative">
                <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                    <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">{{$products[$i]['name']}}</h3>
                </div>
                <div class="background-image" style="background-image: url('{{ asset('images/moto.png') }}');"></div>
            </div>
        </div>
        <div class="col">
            <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg position-relative">
                <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                    <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">{{$products[$i]['name']}}</h3>
                </div>
                <div class="background-image" style="background-image: url('{{ asset('images/animal.png') }}');"></div>
            </div>
        </div>
        <div class="col">
            <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg position-relative">
                <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                    <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">{{$products[$i]['name']}}</h3>
                </div>
                <div class="background-image" style="background-image: url('{{ asset('images/sun-1789653_1280-1.png') }}');"></div>
            </div>
        </div>
    </div>
    @endfor
@endsection
