<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\ProductCreateRequest;
use App\Http\Resources\V1\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return ProductResource::collection($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCreateRequest $request)
    {
        $request->validated();
        $product = Product::create([
            'name' =>$request->name ,
            'description' =>$request->description ,
            'price' =>$request->price ,
            'category' =>$request-> category,
        ]);
        return new ProductResource($product);

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductCreateRequest $request, Product $product)
    {
        $product->update($request->all());
        return new ProductResource($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if($product->delete()){
            return response()->json([
                'message' => 'Success'
            ], 204);
        }else{
            return response()->json([
                'message' => 'Not found'
            ], 404);
        }
    }
}
