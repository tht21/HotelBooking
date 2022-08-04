<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'customer_id' => 'required|unique:bookings',
            'from_date' => 'required',
            'to_date' => 'required',
            'limit_people' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'customer_id.unique' => 'Khách hàng đã đặt phòng',
            'from_date.required' => 'Vui lòng nhập không được để trống',
            'to_date.required' => 'Vui lòng nhập không được để trống',
            'limit_people.required' => 'Vui lòng nhập không được để trống',
        ];

    }
}
