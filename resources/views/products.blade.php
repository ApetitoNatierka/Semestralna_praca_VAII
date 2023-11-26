@extends('layouts.layout_navig')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/styles_products.css') }}">
    <div class="container py-5">
        @php
            $productCount = count($products);
            $emptyCardsCount = $productCount % 3 === 0 ? 0 : 3 - ($productCount % 3);
        @endphp

        @for($i = 0; $i < $productCount + $emptyCardsCount; $i++)
            @if($i % 3 === 0)
                <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4">
                    @endif

                    <div class="col">
                        @if($i < $productCount)
                            <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg position-relative">
                                <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                                    <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">{{$products[$i]['name']}}</h3>
                                <div class="background-image" style="background-image: url('{{ asset('images/sun-1789653_1280.png') }}');"></div>
                                </div>
                            </div>
                        @else
                            <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg position-relative" style="visibility: hidden; height: 0;">
                                <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                                    <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Produkt nevidit</h3>
                                </div>
                            </div>
                        @endif
                    </div>

                    @if(($i + 1) % 3 === 0 || $i === $productCount + $emptyCardsCount - 1)
                </div>
            @endif
        @endfor
    </div>
@endsection
