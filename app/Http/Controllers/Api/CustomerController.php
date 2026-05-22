<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return response()->json(Customer::all());
    }

    public function store(Request $request)
    {
        $customer = Customer::create($request->all());

        return response()->json($customer, 201);
    }

    public function show(Customer $customer)
    {
        return response()->json($customer);
    }

    public function update(Request $request, Customer $customer)
    {
        $customer->update($request->all());

        return response()->json($customer);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return response()->json([
            'message' => 'Customer berhasil dihapus'
        ]);
    }

    public function activate(Customer $customer)
    {
        $customer->update([
            'is_active' => true
        ]);

        return response()->json([
            'message' => 'Customer berhasil diaktifkan'
        ]);
    }

    public function deactivate(Customer $customer)
    {
        $customer->update([
            'is_active' => false
        ]);

        return response()->json([
            'message' => 'Customer berhasil dinonaktifkan'
        ]);
    }
}