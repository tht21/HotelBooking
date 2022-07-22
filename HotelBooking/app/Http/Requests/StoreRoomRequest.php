<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoomRequest extends FormRequest
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
            'name' => 'required|unique:rooms',
            'price' => 'required',
            'convenient' => 'required',
            'image_path' => 'required',
            'room_image_path' => 'required',
            'description' => 'required',

        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập không được để trống',
            'price.required' => 'Vui lòng nhập không được để trống',
            'convenient.required' => 'Vui lòng nhập không được để trống',
            'image_path.required' => 'Vui lòng nhập không được để trống',
            'room_image_path.required' => 'Vui lòng nhập không được để trống',
            'description.required' => 'Vui lòng nhập không được để trống',

        ];

    }
}
