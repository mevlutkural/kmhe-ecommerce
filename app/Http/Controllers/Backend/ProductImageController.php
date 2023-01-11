<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductImageRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product): View
    {
        $productImages = ProductImage::where('product_id', $product->product_id)->get();

        return view('backend.product_images.list_manage_product_images', ['product' => $product, 'productImages' => $productImages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        return view('backend.product_images.add_product_image', ['product' => $product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductImage $productImage, ProductImageRequest $req)
    {
        $imageUrl = rand(10000, 90000) . trim(Carbon::now()->format('d-m-Y-H-i-s')) . '.' . $req->file('image_url')->getClientOriginalExtension();
        $req->file('image_url')->storeAs('public/uploads/product-images/', $imageUrl);
        $result = ProductImage::create([
            'image_url'  => $imageUrl,
            'product_id' => $req->product_id,
            'alt'        => 'product' . $req->product_id
        ]);

        if ($result) {
            return Redirect::to('/dashboard/products/' . $req->product_id . '/product-images');
        } else {
            return redirect()->route('product-images.index')->with('alert', 'failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $req)
    {
        if (ProductImage::where('image_id', $req->id)->delete()) {
            return response('success', 200)->header('Application-Type', 'text/plain');
        } else {
            return response('failed', 401)->header('Application-Type', 'text/plain');
        }
    }
}
