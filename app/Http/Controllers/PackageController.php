<?php

namespace App\Http\Controllers;

use App\Models\Package;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::where('is_active', 1)
            ->orderBy('price', 'asc')
            ->get();

        return view('customers.packages', compact('packages'));
    }
}
