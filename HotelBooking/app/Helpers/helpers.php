<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Str;

class Helper
{
    public static function convertToRupiah($price)
    {
        $price_rupiah = number_format($price, 2, ',', '.') . '  ' . '  ' . 'vnd';
        return $price_rupiah;
    }

    public static function thisMonth()
    {
        return Carbon::parse(Carbon::now())->format('m');
    }

    public static function thisYear()
    {
        return Carbon::parse(Carbon::now())->format('Y');
    }

    public static function dateDayFormat($date)
    {
        return Carbon::parse($date)->isoFormat('dddd, D MMM YYYY');
    }

    public static function dateFormat($date)
    {
        return Carbon::parse($date)->isoFormat('D MMM YYYY');
    }

    public static function dateFormatTime($date)
    {
        return Carbon::parse($date)->isoFormat('D MMM YYYY H:m:s');
    }

    public static function dateFormatTimeNoYear($date)
    {
        return Carbon::parse($date)->isoFormat('D MMM, hh:mm a');
    }
    public static function getTotalPayment($day, $price)
    {
        return $day * $price;
    }
}
