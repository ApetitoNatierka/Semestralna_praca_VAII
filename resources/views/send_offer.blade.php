@extends('layouts.layout_navig')
@section('content')

    <link rel="stylesheet" href="{{ asset('css/styles_send_offer.css') }}">
    <div class="container">
        <div class="card p-3 shadow">
            <h2 class="mb-4">Send Offer</h2>

            <form action="/send_offer/{{$product->id}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea class="form-control" id="description" name="description" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="suggested_price" class="form-label">Suggested Price:</label>
                    <input type="number" class="form-control" id="suggested_price" name="suggested_price" required>
                </div>

                <button type="submit" class="btn btn-primary">Send Offer</button>
            </form>
        </div>
    </div>

@endsection
