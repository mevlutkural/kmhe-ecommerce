<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Slider;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Carbon;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Slider $slider): View
    {
        $sliders = Slider::all();

        return view('backend.slider.list_manage_slider_items', ['sliders' => $sliders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Slider $slider)
    {
        return view('backend.slider.create_slider');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $req)
    {
        $slider = new Slider();
        $imageUrl = rand(10000, 90000) . trim(Carbon::now()->format('d-m-Y-H-i-s')) . '.' . $req->file('image_url')->getClientOriginalExtension();
        $req->file('image_url')->storeAs('public/uploads/slider-images/', $imageUrl);
        $data = $this->prepare($req, $slider->getFillable());
        $data['image_url'] = $imageUrl;
        $slider->fill($data);
        $slider->save();

        return Redirect::to('/dashboard/sliders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $req)
    {
        if (!Slider::where('slider_id', $req->id)->delete()) {
            return response('failed', 401)->header('Application-Type', 'text/plain');
        }
        return response('success', 200)->header('Application-Type', 'text/plain');
    }
}
