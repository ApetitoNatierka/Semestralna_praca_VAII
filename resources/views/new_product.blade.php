@extends('layouts.layout_navig')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/styles_new_product.css') }}">


    @if (is_null($product))
        <div class="container-fluid p-4 mt-5">
    <form class="row g-3" action="/new_product" method="POST">
        @csrf
    <div class="col-md-6">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="col-md-6">
        <label for="price" class="form-label">Price</label>
        <input type="text" class="form-control" id="price" name="price" placeholder="Price$">
    </div>
    <div class="col-12">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" placeholder="Description" name="description"></textarea>
    </div>
        <div class="col-md-4">
            <label for="kraj" class="form-label">Kraj</label>
            <select id="kraj" class="form-select" name="kraj">
                <option selected>Bratislava</option>
                <option>Žilina</option>
                <option>Trnava</option>
            </select>
        </div>
    <div class="col-md-4">
        <label for="category" class="form-label">Category</label>
        <select id="category" class="form-select" name="category">
            <option selected>Moto</option>
            <option>Animal</option>
            <option>Sport</option>
        </select>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Add</button>
    </div>
</form>
    </div>
    @elseif(!empty($product))
        @if(auth()->id() == $product->user_id )
            <div class="container-fluid p-4 mt-5">
                <form class="row g-3" action="/edit_product/{{$product->id}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="col-md-6">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{$product->title}}">
                    </div>
                    <div class="col-md-6">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="Price$" value="{{$product->price}}">
                    </div>
                    <div class="col-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" placeholder="Description" name="description">{{$product->description}}</textarea>
                    </div>
                    <div class="col-md-4">
                        <label for="kraj" class="form-label">Kraj</label>
                        <select id="kraj" class="form-select" name="kraj">
                            <option selected>{{$product->kraj}}</option>
                            <option>Bratislava</option>
                            <option>Žilina</option>
                            <option>Trnava</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="category" class="form-label">Category</label>
                        <select id="category" class="form-select" name="category">
                            <option selected>{{$product->category}}</option>
                            <option>Moto</option>
                            <option>Animal</option>
                            <option>Sport</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        @endif
    @endif
@endsection
