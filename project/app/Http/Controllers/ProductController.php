<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['index','show']);
    }

    public function index()
    {
        $products = Product::get();
        return view('products.index',compact('products'));

    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|max:4096',
        ]);

        $userID = Auth::id();
        $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'),$new_name);
        $form_data = array(
            'name' => $request->name,
            'description' => $request->description,
            'image' => $new_name,
            'user_id' =>$userID,
        );

        Product::create($form_data);

        return redirect()->route('products.index')
            ->with('success','Product created successfully.');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show',compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit',compact('product'));
    }

    public function update(Request $request, $id)
    {
        $image_name = $request->hidden_image;
        $image = $request->file('image');

        if($image != ''){
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'image' => 'image|max:4096'
            ]);
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }
        else{
            $request->validate([
                'name' => 'required',
                'description' => 'required',
            ]);
        }

        $form_data = array(
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image_name,
        );

        Product::whereId($id)->update($form_data);

        return redirect()->route('products.index')
            ->with('success','Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')
            ->with('success','Product deleted successfully.');
    }
}
