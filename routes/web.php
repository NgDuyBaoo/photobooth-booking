<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PackageController;
use App\Models\Package;
use App\Models\Booking;

// Trang chủ
Route::get('/', function () {
    return redirect()->route('customers.create');
});

// Form thông tin khách hàng
Route::get('/customer-information', [
    CustomerController::class, 'create'
])->name('customers.create');

// Lưu thông tin khách hàng
Route::post('/customer-information', [
    CustomerController::class, 'store'
])->name('customers.store');

// Danh sách gói chụp
Route::get('/packages', [
    PackageController::class, 'index'
])->name('packages.index');

// Khách hàng chọn gói
Route::post('/packages/select/{package}', function (
    Request $request,
    Package $package
) {
    abort_unless($package->is_active, 404);

    $customerId = session('customer_id');

    if (!$customerId) {
        return redirect()->route('customers.create');
    }

    $booking = Booking::create([
        'customer_id' => $customerId,
        'package_id' => $package->id,
        'status' => 'pending',
    ]);

    return redirect()->route('bookings.success', $booking);
})->name('packages.select');

// Trang xác nhận
Route::get('/bookings/{booking}/success', function (Booking $booking) {
    abort_unless(
        (int) $booking->customer_id === (int) session('customer_id'),
        403
    );

    $booking->load(['customer', 'package']);

    return view('bookings.success', compact('booking'));
})->name('bookings.success');