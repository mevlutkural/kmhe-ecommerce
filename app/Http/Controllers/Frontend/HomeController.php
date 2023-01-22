<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::where('is_active', '1')->get();
        $products = Product::where('is_active', '1')->take(8)->get();
        $brands = Brand::orderBy('sequence', 'asc')->where('is_active', '1')->get();
        $sliders = Slider::where('is_active', '1')->get();

        return view('frontend.index', [
            'categories' => $categories,
            'products'   => $products,
            'brands'     => $brands,
            'sliders'    => $sliders
        ]);
    }

    public function category($category_slug)
    {
        $category = Category::where('category_slug', $category_slug)->first();
        $sliders = Slider::where('is_active', '1')->get();

        return view('frontend.products_by_category', [
            'categories'         => Category::all(),
            'products'           => Product::where('category_id', $category->category_id)->get(),
            'category'           => $category, 'Òproducts' => Product::all(),
            'brands'             => Brand::orderBy('sequence', 'asc')->where('is_active', '1')->get(),
            'productsByCategory' => $category->products,
            'sliders'            => $sliders
        ]);
    }
}
