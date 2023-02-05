<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\Frontend\CustomerRequest;
use App\Models\Customer;
use Illuminate\Support\Facades\Redirect;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('backend.customers.list_manage_customers', ['customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.customers.create_customer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $req)
    {
        $customer = new Customer();
        $data = $this->prepare($req, $customer->getFillable());
        $customer->fill($data);
        $customer->save();

        return Redirect::to('/dashboard/customers');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('backend.customers.edit_customer', ['customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $req, Customer $customer)
    {
        $data = $this->prepare($req, $customer->getFillable());
        $customer->fill($data);
        $customer->save();

        return Redirect::to('/dashboard/customers')->with('alert', 'Customer has successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Model  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $result = $customer->delete();

        if (!$result) {
            return response('failed', 400);
        }

        return response('success', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return Illuminate\Contracts\View\View
     */
    public function registerForm(): View
    {
        $categories = Category::where('is_active', '1')->get();

        return view('frontend.auth.register', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Backend\CustomerRequest  $req
     * @return \Illuminate\Http\Response
     */
    public function register(CustomerRequest $req)
    {
        $customer = new Customer();
        $data = $this->prepare($req, $customer->getFillable());
        $customer->fill($data);
        $customer->save();

        return Redirect::to('/');
    }

    public function changePasswordForm(Customer $customer)
    {
        return view('backend.customers.change_password', ['customer' => $customer]);
    }

    public function changePassword(Customer $customer, CustomerRequest $req)
    {
        $data = $this->prepare($req, $customer->getFillable());
        $customer->fill($data);
        $customer->save();

        return Redirect::to('/dashboard/customers');
    }
}
