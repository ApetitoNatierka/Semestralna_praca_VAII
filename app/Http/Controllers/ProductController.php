<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Comment;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function get_users_products() {
        $products = auth()->user()->usersProducts()->latest()->get();

        return view('products', ['products' => $products]);
    }

    public function get_products_all() {
        $products = Products::all();
        return view('products', ['products' => $products]);
    }

    public function get_product($product_id) {
        $product = Products::find($product_id);
        $comments = Comment::where('product_id', $product->id)->latest()->get();

        return view('product', ['product' => $product, 'comments' => $comments]);
    }

    public function get_edit_product($product_id) {
        $product = Products::find($product_id);

        if(auth()->id() !== $product['user_id']) {
            redirect('/');
        }

        return view('new_product', ['product' => $product]);
    }

    public function get_new_product() {
        $product = null;
        return view('new_product', compact('product'));
    }

    public function add_new_comment(Request $request) {
        $incoming_fields_ = $request->validate(['comment' => 'required|string',
                                                'product_id' => 'required']);
        $product_id = $request->get('product_id');

        $incoming_fields_['comment'] = strip_tags($incoming_fields_['comment']);
        $incoming_fields_['product_id'] = strip_tags($incoming_fields_['product_id']);
        $incoming_fields_['user_id'] = auth()->id();

        Comment::create($incoming_fields_);
        $product = Products::find($product_id);
        $comments = Comment::where('product_id', $product->id)->latest()->get();

        return view('product', ['product' => $product, 'comments' => $comments]);
    }

    public function new_product(Request $request) {

        $incoming_fields_ = $request->validate([
            'title' => ['required', 'min:3', 'max:30'],
            'price' => ['required', 'integer'],
            'description' => ['required', 'min:1', 'max:1000'],
            'kraj' => ['required'],
            'category' => ['required'],
        ]);

        $incoming_fields_['title'] = strip_tags($incoming_fields_['title']);
        $incoming_fields_['price'] = strip_tags($incoming_fields_['price']);
        $incoming_fields_['description'] = strip_tags($incoming_fields_['description']);
        $incoming_fields_['kraj'] = strip_tags($incoming_fields_['kraj']);
        $incoming_fields_['category'] = strip_tags($incoming_fields_['category']);
        $incoming_fields_['user_id'] = auth()->id();

        Products::create($incoming_fields_);

        return redirect('/');
    }

    public function edit_product(Products $product, Request $request) {

        if(auth()->id() !== $product['user_id']) {
            redirect('/');
        }

        $incoming_fields_ = $request->validate([
            'title' => ['required', 'min:3', 'max:30'],
            'price' => ['required', 'integer'],
            'description' => ['required', 'min:1', 'max:4000'],
            'kraj' => ['required'],
            'category' => ['required'],
        ]);

        $incoming_fields_['title'] = strip_tags($incoming_fields_['title']);
        $incoming_fields_['price'] = strip_tags($incoming_fields_['price']);
        $incoming_fields_['description'] = strip_tags($incoming_fields_['description']);
        $incoming_fields_['kraj'] = strip_tags($incoming_fields_['kraj']);
        $incoming_fields_['category'] = strip_tags($incoming_fields_['category']);
        $incoming_fields_['user_id'] = auth()->id();

        $product->update($incoming_fields_);

        return redirect('/');
    }

    public function delete_product(Products $product) {

        if(auth()->id() === $product['user_id']) {
            $product->delete($product);
        }

        return redirect('/');
    }

    public function delete_comment(Comment $comment) {

        $product = Products::find($comment->product_id);
        $comments = Comment::where('product_id', $product->id)->latest()->get();

        if(auth()->id() === $comment->user_id) {
            $comment->delete();
        }

        return view('product', ['product' => $product, 'comments' => $comments]);
    }

    public function get_products_search(Request $request) {
        $page = $request->input('page', 1);
        $perPage = 12;
        $searchTerm = $request->input('search');

        $products = Products::where('description', 'like', '%' . $searchTerm . '%')->orWhere('title', 'like', '%' . $searchTerm . '%')->paginate($perPage, ['*'], 'page', $page);

        return view('products', ['products' => $products]);
    }

    public function get_products_by_price(Request $request) {
        $page = $request->input('page', 1);
        $perPage = 12;
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');

        $products = Products::whereBetween('price', [$minPrice, $maxPrice])->paginate($perPage, ['*'], 'page', $page);

        return view('products_ref', ['products' => $products]);
    }

    public function load_more_products(Request $request)
    {
        $page = $request->input('page', 1);
        $perPage = 12;

        $searchTerm = $request->input('search', '');
        $minPrice = $request->input('min_price', null);
        $maxPrice = $request->input('max_price', null);

        $productsQuery = Products::query();

        if ($searchTerm) {
            $productsQuery->where(function ($query) use ($searchTerm) {
                $query->where('description', 'like', '%' . $searchTerm . '%')
                    ->orWhere('title', 'like', '%' . $searchTerm . '%');
            });
        }

        if ($minPrice !== null && $maxPrice !== null) {
            $productsQuery->whereBetween('price', [$minPrice, $maxPrice]);
        }

        $products = $productsQuery->paginate($perPage, ['*'], 'page', $page);

        if ($products->isEmpty()) {
            return response()->json(['no_more_data' => true]);
        }

        return view('products_ref', ['products' => $products]);
    }

}
