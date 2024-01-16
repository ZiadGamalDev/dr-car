<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\ServiceInterface;
use App\Http\Interfaces\BookingServiceInterface;
use App\Http\Interfaces\CouponInterface;
use App\Http\Requests\Admin\ServiceRequest;
use App\Http\Requests\BookingServiceRequest;
use App\Http\Requests\CouponRequest;
use App\Http\Requests\payBookingSeriviceRequest;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function __construct(private ServiceInterface $serviceInterface, private BookingServiceInterface $bookingServiceInterface, private CouponInterface $couponInterface)
    {
    }

    public function index()
    {
        return $this->serviceInterface->index();
    }
    public function store(ServiceRequest $request)
    {
        return $this->serviceInterface->store($request);
    }
    public function show(string $id)
    {
        return $this->serviceInterface->show($id);
    }
    public function update(ServiceRequest $request, string $id)
    {
        return $this->serviceInterface->update($request, $id);
    }
    public function delete(string $id)
    {
        return $this->serviceInterface->delete($id);
    }


    // Booking service
    public function bookingService(BookingServiceRequest $request)
    {
        return $this->bookingServiceInterface->bookingService($request);
    }
    public function payBookingSerivice(payBookingSeriviceRequest $request, $service_id)
    {
        return $this->bookingServiceInterface->payBookingSerivice($request, $service_id);
    }
    public function success(Request $request)
    {
        return $this->bookingServiceInterface->success($request);
    }
    public function error()
    {
        return 'User declined the payment!';
    }




    // Coupon 
    public function indexCoupon()
    {
        return $this->couponInterface->index();
    }
    public function storeCoupon(CouponRequest $request)
    {
        return $this->couponInterface->store($request);
    }
    public function showCoupon($coupon_id)
    {
        return $this->couponInterface->show($coupon_id);
    }
    public function updateCoupon(CouponRequest $request,  $coupon_id)
    {
        return $this->couponInterface->update($request, $coupon_id);
    }
    public function deleteCoupon($coupon_id)
    {
        return $this->couponInterface->delete($coupon_id);
    }
}
