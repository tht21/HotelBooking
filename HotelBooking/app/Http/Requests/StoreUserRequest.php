<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'email' => 'required',
            'password' => 'required',
            'birth_day' => 'required',
            'address' => 'required',
            'avatar' => 'required',
            'phone' => 'required|unique:users',
            'gender ' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng không được để trống',
            'email.required' => 'Vui lòng không được để trống',
            'password.required' => 'Vui lòng không được để trống',
            'birth_day.required' => 'Vui lòng không được để trống',
            'address.required' => 'Vui lòng không được để trống',
            'avatar.required' => 'Vui lòng không được để trống',
            'phone.required' => 'Vui lòng không được để trống',
            'phone.unique' => 'Số điện thoại đã tồn tại',
        ];

    }
}
