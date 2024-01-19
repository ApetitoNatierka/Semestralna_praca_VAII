@extends('layouts.layout_navig')
@section('content')

    <link rel="stylesheet" href="{{ asset('css/styles_offers.css') }}">
    <div class="container">
        @forelse ($offers as $offer)
            <div class="offer">
                <p class="description">{{ $offer->get_description() }}</p>
                <p class="suggested-price">Suggested Price: ${{ $offer->get_suggested_price() }}</p>
                @if(auth()->id() == $offer->get_to_user())
                    @if(stripos($offer->get_description(), "accepted") === false)
                        <form action="/accept_offer/{{ $offer->get_id() }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn--accept">Accept</button>
                        </form>
                        <form action="/reject_offer/{{ $offer->get_id() }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn--reject">Reject</button>
                        </form>
                    @else
                        <form action="/delete_offer/{{ $offer->get_id() }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn--reject">Delete</button>
                        </form>
                    @endif
                @endif
            </div>
        @empty
            <p>No offers available.</p>
        @endforelse
    </div>

@endsection
