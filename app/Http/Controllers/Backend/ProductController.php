<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\Slider;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    private $categories,$products;
    public function __construct()
    {
        $this->categories = Category::where('is_active', '1')->get();
        $this->products = Product::all();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $protducts = $this->products;

        return view('backend.products.list_manage_products', ['products' => $protducts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categories;

        return view('backend.products.create_product', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $req)
    {
        /* dd($req->input()); */
        $product = new Product();
        $data = $this->prepare($req, $product->getFillable());
        $data['slug'] = Str::slug($req->product_name);
        $product->fill($data);
        $product->save();

        return Redirect::to('/dashboard/products');
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
    public function edit(Product $product)
    {
        $categories = $this->categories;

        return view('backend.products.edit_product', ['categories' => $categories, 'product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $req, Product $product)
    {
        $data = $this->prepare($req, $product->getFillable());
        $data['slug'] = Str::slug($req->product_name);
        $product->fill($data);
        $product->save();

        return Redirect::to('/dashboard/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $result = $product->delete();

        if ($result) {
            return response('success', 200)->header('Content-type', 'text/plain');
        } else {
            return response('failed', 401)->header('Content-type', 'text/plain');
        }
    }

    public function getProducts()
    {
        $products = Product::get();
        $products[0]->image = ProductImage::first()->image_url;
        return response()->json($products);
    }

    public function productDetails(Product $product)
    {
        $categories = $this->categories;
        $products = $this->getProductsByCategory($product->category_id);
        $sliders = Slider::where('is_active', '1')->get();

        return view('frontend.product_detail', ['product' => $product, 'categories' => $categories, 'products' => $products]);
    }

    public function getProductsByCategory($category_id)
    {
        return Product::where('category_id', $category_id)->get();
    }

    public function updateIsActive(Product $product, Request $req)
    {
        $product->is_active = $req->is_active;
        $result = $product->save();

        return response($product);
    }

    public function updateStockQuantity(Product $product, Request $req)
    {
        $product->stock_quantity = $req->stock_quantity;
        $result = $product->save();

        return response($product);
    }
}
