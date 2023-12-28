@extends('layouts.layout_navig')
@section('content')

    <link rel="stylesheet" href="{{ asset('css/styles_offers.css') }}">
    <div class="container">
        @forelse ($offers as $offer)
            <div class="offer">
                <p class="description">{{ $offer->description }}</p>
                <p class="suggested-price">Suggested Price: ${{ $offer->suggested_price }}</p>
                <form action="/accept_offer/{{ $offer->id }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn--accept">Accept</button>
                </form>
                <form action="/reject_offer/{{ $offer->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn--reject">Reject</button>
                </form>
            </div>
        @empty
            <p>No offers available.</p>
        @endforelse
    </div>

@endsection
