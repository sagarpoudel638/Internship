<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;



class CustomerController extends Controller
{
    function customer()
    {
        $this->data['title'] = 'CustomerDetails';
        $customerData = customer::orderBy('id', 'desc')->paginate(8);
        return view('customer', compact('customerData'), $this->data);
    }

    function edit()
    {
        return view('editcustomer');
    }

    function addCustomer(Request $request)
    {

        if ($request->isMethod('get')) {
            return redirect()->back();
        }

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'firstname' => 'required|min:3',
                'lastname' => 'required|min:3',
                'phonenumber' => 'required|min:10;',
                'address' => 'required|min:3',
            ]);
            $data['firstname'] = $request->firstname;
            $data['lastname'] = $request->lastname;
            $data['phonenumber'] = $request->phonenumber;
            $data['address'] = $request->address;

            if (customer::create($data)) {
                return redirect()->route('customer')->with('success', 'Record is Inserted');
            }
        }
    }

    public function deleteCustomer(Request $request)
    {
        $id = $request->user_id;
        if(customer::findOrFail($id)->delete()){
            return redirect()->route('customer')->with('success', 'Record is Deleted');
        }
    }

    public function editCustomer(Request $request){
        $id= $request->user_id;
        $editRecord = customer::findOrFail($id);
        return view('editcustomer', compact('editRecord'));

    }
    public function editAction(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'firstname' => 'required|min:3',
                'lastname' => 'required|min:3',
                'phonenumber' => 'required|min:10;',
                'address' => 'required|min:3',
            ]);
            $data['firstname'] = $request->firstname;
            $data['lastname'] = $request->lastname;
            $data['phonenumber'] = $request->phonenumber;
            $data['address'] = $request->address;
            $id = $request->customer_id;

            if(customer::where('id',$id)->update($data)){
                return redirect()->route('customer')->with('success', 'Record is Updated');
            }
        }
    }
}
