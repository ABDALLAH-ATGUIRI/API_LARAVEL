<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        // return view('products.index', compact('products'))->with(request()->input('page'));
        return response()->json($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the input
        $this->validate($request, [
            'name' => 'required|max:255',
            'detail' => 'required',
        ]);

        //create a new product in the database
        $products = Product::create($request->all());

        //redirect the user and send a message
        // return redirect()->route('products.index')->with('success', 'Product created successfully');

        return response()->json($products, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function showw(Product $product)
    {
        // return view('products.show', compact('product'));
        // return response()->json($product);
        return new ProductResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate the input
        $this->validate($request, [
            'name' => 'required|max:255',
            'detail' => 'required',
        ]);

        //update the product in the database
        $product = Product::findOrFail($id);
        // $product->update($request->all());
        $product->name = $request->get('name');
        $product->detail = $request->get('detail');
        $product->save();

        //redirect the user and send a message
        // return redirect()->route('products.index')->with('success', 'Product updated successfully');
        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        //delete the product from the database
        $product->delete();


        //redirect the user and send a message
        // return redirect()->route('products.index')->with('success', 'Product deleted successfully');
        return response()->json();
    }



    public function getStudent($id)
    {
        if (Product::where('id', $id)->exists()) {
            $student = Product::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($student, 200);
        } else {
            return response()->json([
                "message" => "Student not found"
            ], 404);
        }
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }
    public function name($name)
    {
        $product = Product::where('name', 'like', '%' . $name . '%')->get();
        return response()->json($product);
    }
}
