@extends('layouts.layout_navig')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/style_new_product.css') }}">


    @if (is_null($product))
        <div class="container-fluid p-4 mt-5">
    <form class="row g-3" action="/new_product" method="POST" enctype="multipart/form-data">
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
            <label for="images" class="form-label">Images</label>
            <input type="file" class="form-control" id="images" name="images[]" multiple>
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
                        <label for="images" class="form-label">Images</label>
                        <input type="file" class="form-control" id="images" name="images[]" multiple>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
            <div class="container">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($product->images as $image)
                        <tr>
                            <td>
                                <img class="product_image custom_size" src="{{ asset('storage/' . $image->path) }}" alt="Image">
                            </td>
                            <td>
                                <!--prevzate z internetu-->
                                <button class="btn btn-edit" data-toggle="modal" data-target="#editImageModal{{$image->id}}">
                                    Edit
                                </button>
                                <!--prevzate z internetu-->
                                <form action="/delete_image/{{$image->id}}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this image?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <!--prevzate z internetu-->
                        <div class="modal fade" id="editImageModal{{$image->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Image</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/edit_image/{{$image->id}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--prevzate z internetu-->
                    @empty
                        <tr>
                            <td colspan="2">No images found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

        @endif
    @endif
@endsection
