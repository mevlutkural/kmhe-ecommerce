<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();

        return view('backend.brands.list_manage_brands', ['brands' => $brands]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.brands.create_brand');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $req)
    {
        $isActive = $req->input('is_active') == '1' ? '1' : '0';
        $brand = new Brand();
        $data = $this->prepare($req, $brand->getFillable());
        $imageUrl = rand(10000, 90000) . trim(Carbon::now()->format('d-m-Y-H-i-s')) . '.' . $req->file('image_url')->getClientOriginalExtension();
        $req->file('image_url')->storeAs('public/uploads/brands/', $imageUrl);
        $data['image_url'] = $imageUrl;
        $data['is_active'] = $isActive;
        $brand->fill($data);
        $brand->save();

        return Redirect::to('/dashboard/brands');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('backend.brands.edit_brand', ['brand' => $brand]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $req, Brand $brand)
    {
        $data = $this->prepare($req, $brand->getFillable());
        $brand->fill($data);
        $brand->save();

        return Redirect::to('/dashboard/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $result = $brand->delete();

        if (!$result) {
            return response('failed', 400);
        }
        return response('success');
    }
}
