<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoomtypeRequest extends FormRequest
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
            'limit_people' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên loại phòng',
            'limit_people.required' => 'Vui lòng nhập số lượng người'
        ];
        
    }
}
