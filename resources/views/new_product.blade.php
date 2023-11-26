@extends('layouts.layout_navig')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/styles_new_product.css') }}">
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
        <input type="text" class="form-control" id="description" placeholder="Description" name="description">
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
@endsection
