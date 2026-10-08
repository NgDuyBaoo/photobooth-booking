<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => ['required', 'regex:/^0[0-9]{9}$/'],
        ]);

        $customer = Customer::updateOrCreate(
            ['phone' => $validated['phone']],
            ['name' => $validated['name']]
        );

        return redirect()
    ->route('customers.packages')
    ->with('success', 'Đăng ký thông tin thành công!');
    }
}
