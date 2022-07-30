<?php

namespace App\Repositories\Eloquent;

use App\Models\Booking;
use App\Repositories\Interfaces\CheckoutInterface;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;


class CheckoutRepository extends EloquentRepository implements CheckoutInterface
{
    public function getModel()
    {
        return Booking::class;
    }

    public function getAll($request)
    {
        $result = $this->model->orderBy('id', 'desc')->paginate(10);
        return $result;
    }

    public function create($request)
    {
        $checkout = $this->model;
        $checkout->name = $request->name;
        $checkout->email = $request->email;
        $checkout->phone = $request->phone;
        $checkout->address = $request->address;
        $checkout->cmnd = $request->cmnd;
        $checkout->from_date = new DateTime($request->booking_checkin);
        $checkout->to_date = new DateTime($request->booking_checkout);
        $day = $checkout->booking_checkin->diff($checkout->booking_checkout);
        $checkout->total_room = $day->checkout->total_room;
        try {
            $checkout->save();
            return true;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
        return $checkout;
    }

    


}
