@forelse ($notifications as $notification)
    @php
        $to_user = \App\Models\User::find($notification->from_user);
        $product = \App\Models\Products::find($notification->product_id)
    @endphp

    <a href="/received_offers">
        <p>You optained offer from {{$to_user->name}} on product {{$product->title}}</p>
    </a>
@empty
    <p>No offers available.</p>
@endforelse
