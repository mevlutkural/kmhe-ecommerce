<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.index', ['categories' => Category::all(), 'products' => Product::where('is_active', '1')->get(), 'brands' => Brand::orderBy('sequence', 'asc')->where('is_active', '1')->get()]);
    }

    public function category($category_slug)
    {
        $category = Category::where('category_slug', $category_slug)->first();

        return view('frontend.index', ['categories' => Category::all(), 'products' => Product::where('category_id', $category->category_id)->get(), 'category' => $category, 'products' => Product::all()]);
    }
}
