<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            $product = Product::with('category')
                ->where('name', 'LIKE', '%'.$request->search.'%')
                ->orwhere('description', 'LIKE', '%'.$request->search.'%')
                ->paginate(3);
        }else{
            $product = Product::with('category')->paginate(3);
        }

        return view('pages.product.index', compact('product'));
    }

    public function create(){
        $category = Category::all();
        return view('pages.product.create', compact('category'));
    }

    public function store(ProductRequest $request){
        Product::create($request->all());
        return redirect('product')->with('success', 'Your product has been saved.');
    }

    public function edit($id){
        $product = Product::find($id);
        $category = Category::all();
        return view('pages.product.edit', compact('product', 'category'));
    }

    public function update(ProductRequest $request, $id){
        $product = Product::find($id);
        $product->update($request->all());

        return redirect()->intended('/product')->with('success', 'Your product has been updated.');
    }

    public function delete($id){
        $product = Product::find($id);
        $product->delete();

        return redirect()->intended('/product')->with('success', 'Your product has been deleted.');
    }
}
