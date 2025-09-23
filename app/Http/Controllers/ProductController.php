<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = product::latest()->get();
        return view('dashboard.products', compact('products'));
    }

    public function create(){
        return view('dashboard.addProduct');
    }

    public function store(Request $request){
        $request->validate([
            'Pname' => 'required|max:50',
            'Pprice' => 'required',
            'Pdesc' => 'required'
        ]);

         product::create($request->all());
         return redirect('/products');
    }

    public function edit($id){
        $product = product::find($id);
        return view('dashboard.editProduct',compact('product'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'Pname' => 'required|max:50',
            'Pprice' => 'required',
            'Pdesc' => 'required'
        ]);

         product::findOrFail($id)->update($request->all());
         return redirect('/products');
    }
}
