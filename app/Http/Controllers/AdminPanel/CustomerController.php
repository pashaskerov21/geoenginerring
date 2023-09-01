<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerStoreRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::where('destroy',0)->orderBy('sort')->get();
        return view('admin-panel.customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-panel.customers.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerStoreRequest $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->image;
            $customer_img = time() . $file->getClientOriginalName();
            $file->move('uploads/customers', $customer_img);

            Customer::create([
                'image' => $customer_img,
                'image_old' => $customer_img,
                'url' => $request->url,
            ]);
            return redirect()->route('admin.customers.index')->with('success', 'Uğurla əlavə edildi');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::findOrFail($id);
        return view('admin-panel.customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerUpdateRequest $request, string $id)
    {
        $customer = Customer::findOrFail($id);
        if ($request->hasFile('image')) {
            $file = $request->image;
            $customer_img = time() . $file->getClientOriginalName();
            $file->move('uploads/customers', $customer_img);

            if (file_exists('uploads/customers/' . $customer->image_old)) {
                unlink('uploads/customers/' . $customer->image_old);
            }

            $customer->image = $customer_img;
            $customer->image_old = $customer_img;
        }else{
            $customer->image = $customer->image_old;
        }
        $customer->url = $request->url;
        $customer->save();
        return redirect()->route('admin.customers.index')->with('success', 'Dəyişikliklər uğurla yadda saxlanıldı');
    }

    public function sort(Request $request){
       
        $sorts = $request->sort;
        foreach($sorts as $key=>$sort){
            Customer::where('id', $sort)->update(['sort' => $key]);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->destroy = 1;
        $customer->save();
        return redirect()->route('admin.customers.index')->with('success','Uğurla silindi');
    }
}
