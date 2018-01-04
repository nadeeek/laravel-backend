<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    public function postCustomer(Request $request)
    {
        // $data = Input::all(); 
        $data = $request->json()->all();

        $customer = new Customer();

        $customer->name = $data['customer']['name'];
        $customer->address = $data['customer']['address'];
        $customer->phone = $data['customer']['phone'];
        $customer->save();
        return response()->json(['customer' => $customer], 201);
      
    }

    public function getCustomers()
    {
        $customers = Customer::all();
        $response = [
          'customers' => $customers
        ];
        return response()->json($response, 200);
    }

    public function getCustomerByID($id)
    {
        $customer = Customer::find($id);
        if (!$customer) {
            return response()->json(['message' => 'Document not found'], 404);
        }

        $response = [
          'customer' => $customer
        ];
        return response()->json($response, 200);
    }

    public function putCustomer(Request $request, $id)
    {
        $customer = Customer::find($id);
        if (!$customer) {
            return response()->json(['message' => 'Document not found'], 404);
        }
        $customer->name = $request->input('name');
        $customer->address = $request->input('description');
        $customer->phone = $request->input('author');
        $customer->save();
        return response()->json(['customer' => $customer], 200);
    }

    public function deleteCustomer($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return response()->json(['message' => 'Customer deleted'], 200);
    }
}
