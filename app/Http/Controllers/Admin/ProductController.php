<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\createProductRequest;
use App\Http\Requests\updateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::orderby('id', 'DESC')->get();
        return view('Admin/products/index', compact('products'));
    }


    public function create()
    {
        return view('Admin/products.create');
    }

    public function store(createProductRequest $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->inventory = $request->inventory;
        $file = $request->file('image');
        if (!empty($file)) {
            $image = $file->getClientOriginalName();
            $pathImage = 'images/products/' . $image;
            if (file_exists($pathImage)) {
                $image = bin2hex(random_bytes(10)) . $image;
            }
            $file->move('images/products', $image);
            $product->image = $image;
        }
        $product->save();
        session()->flash('store', 'successfully!!!added product');
        return redirect()->route('products.create');
    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        return view('Admin/products/edit', compact('product'));
    }

    public function update(updateProductRequest $request, Product $product)
    {
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->inventory = $request->inventory;
        $file = $request->file('image');
        if (!empty($file)) {
            $image_path = public_path('images/products/' . $product->image);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            $image = $file->getClientOriginalName();
            $pathImage = 'images/products/' . $image;
            if (file_exists($pathImage)) {
                $image = bin2hex(random_bytes(10)) . $image;
            }
            $file->move('images/products', $image);
            $product->image = $image;
        } else {
            $image = $product->image;
            $request->image = $image;
        }
        $product->save();
        session()->flash('update', 'successfully!!!updated product');
        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $image_path = public_path('images/products/' . $product->image);
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        $product->delete();
        session()->flash('delete', 'successfully Deleted!!!');
        return redirect()->route('products.index');
    }
}
