@extends('layouts.layout_navig')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/styles_product.css') }}">
    <div class="p-5 text-center bg-body-tertiary">
        <div class="container py-5">
            <div class="d-flex flex-column align-items-center">
                <h1 class="text-body-emphasis"> {{$product->get_title()}}</h1>
                <p class="col-lg-8 mx-auto lead">
                   {{$product->get_description()}}
                </p>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5">
        <div class="row">
            <div class="col-md-6  text-center">
                <p class="cena">Cena: {{$product->get_price()}} $</p>
                <p class="kraj">Kraj: {{$product->get_kraj()}} </p>
                <p class="category">Category: {{$product->get_category()}} </p>
                <p class="users_e_mail">E mail: {{$product->user->get_email()}} </p>
            </div>
            <div class="col-md-6 text-center">
                <div class="swiper-container text-center-content">
                    <div class="swiper-wrapper text-center-content">
                        @forelse ($product->images as $index => $image)
                            <div class="swiper-slide {{$index == 0 ? 'active' : ''}}">
                                <img src="{{ asset('storage/' . $image->get_path()) }}" alt="Obrazok" class="img-fluid mx-auto d-block">
                            </div>
                        @empty
                            <div class="swiper-slide">
                                <p>No images available</p>
                            </div>
                        @endforelse
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="button-container">
        @if(auth()->id() == $product->get_user_id())
        <a href="/edit_product/{{$product->get_id()}}">
            <button class="btn btn--primary">Edit</button>
        </a>
        @endif

        @if(auth()->id() == $product->get_user_id())
                <form action="/delete_product/{{$product->get_id()}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn--secondary">Delete</button>
                </form>
        @endif
    </div>
    <div class="offer_section">
        @if(auth()->check() && auth()->id() != $product->get_user_id())
            <a href="/send_offer/{{$product->get_id()}}">
                <button class="btn btn--secondary">Send offer</button>
            </a>
        @elseif(auth()->id() == $product->get_user_id())
            <p>Cannot send offer to your own product</p>
        @else
            <a href="/sign_in">
                <button class="btn btn--secondary">Send offer</button>
            </a>
        @endif
    </div>
    <div class="comments-section">
        <h3>Comment section</h3>

        @foreach($comments as $comment)
            <div class="comment">
                @php
                    $user = \App\Models\User::find($comment->get_user_id());
                @endphp
                <h5 class="name">{{ $user->get_name() }}</h5>
                <p>{{ $comment->get_comment()}}</p>
                @if(auth()->id() == $comment->get_user_id())
                    <div class="comment-action">
                    <form action="/delete_comment/{{$comment->get_id()}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn--secondary">Delete</button>
                    </form>
                    </div>
                @endif
            </div>
        @endforeach

        @if(auth()->check())
        <form action="/add_comment" method="POST">
            @csrf
                <input type="hidden" name="product_id" value="{{ $product->get_id() }}">
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
