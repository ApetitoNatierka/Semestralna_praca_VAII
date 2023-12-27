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
    <div class="button-container">
        @if(auth()->id() == $product->user_id)
        <a href="/edit_product/{{$product->id}}">
            <button class="btn btn--primary">Edit</button>
        </a>
        @endif

        @if(auth()->id() == $product->user_id)
                <form action="/delete_product/{{$product->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn--secondary">Delete</button>
                </form>
        @endif
    </div>
    <div class="comments-section">
        <h3>Komentáre</h3>

            <div class="comment">
                <h5 class = "name">Jan Franak</h5>
                <p>tu bude nejaky komentar comment</p>
            </div>

        @if(auth()->check())
        <form action="/add_comment" method="POST">
            @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <textarea name="comment" placeholder="Pridať komentár"></textarea>
            <button type="submit" class="add-comment-btn">Pridať komentár</button>
        </form>
        @else
            <a href="/sign_in">
                <p>Pre pridanie komentára sa prosím prihláste.</p>
            </a>
        @endif
    </div>
@endsection
