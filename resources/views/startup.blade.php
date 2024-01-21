@extends('layouts.layout_navig')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/styles_startup.css') }}">
    <script src="{{ asset('js/infinite_scroll.js') }}"></script>
    <div id="product-container">
    <div class="album py-5 bg-body-tertiary">
        <div id="products-container" class="container py-5">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <div class="col">
                    <div class="card shadow-sm">
                        <a href="#">
                            <img class="bd-placeholder-img card-img-top" src="{{ asset('images/moto.png') }}" alt="Moto">
                        <div class="card-body">
                            <p class="category-link text-center">Moto</p>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <a href="#">
                        <img class="bd-placeholder-img card-img-top" src="{{ asset('images/animal.png') }}" alt="Animal">
                        <div class="card-body">
                            <p class="category-link text-center">Animal</p>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <a href="#">
                            <img class="bd-placeholder-img card-img-top" src="{{ asset('images/sport.png') }}" alt="Sport">
                        <div class="card-body">
                            <p class="category-link text-center">Sport</p>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

