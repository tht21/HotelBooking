<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'cmnd' => 'required',
            'address' => 'required',
            'booking_checkin' => 'required',
            'booking_checkout' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên',
            'email.required' => 'Vui lòng nhập email',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'booking_checkin.required' => 'Vui lòng nhập ngày đến',
            'booking_checkout.required' => 'Vui lòng nhập ngày đi',
            'cmnd.required' => 'Vui lòng nhập số CMND/CCCD',
            'email.email' => 'Vui lòng nhập đúng định dạng email'
        ];

    }
}
