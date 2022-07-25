<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BookingExport implements FromCollection, WithHeadings
{
    /**
     * @return Collection
     */
    public function collection()
    {
        return DB::table('customers')
            ->join('bookings', 'bookings.customer_id', '=', 'customers.id')
            ->join('room_bookings', 'bookings.id', '=', 'room_bookings.booking_id')
            ->join('rooms', 'room_bookings.room_id', '=', 'rooms.id')
            ->select('bookings.id', 'customers.name as customer_name', 'customers.phone', 'rooms.name', 'rooms.price', 'bookings.from_date', 'bookings.to_date', 'bookings.limit_people')
            ->get();
    }

    public function headings(): array
    {
        return ["STT", "Tên khách hàng", 'SDT', "Phòng", "Giá phòng", 'Ngày nhận phòng', 'Ngày trả phòng', 'Số lượng người'];
    }
}
