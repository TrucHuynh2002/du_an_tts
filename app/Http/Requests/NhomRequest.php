<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NhomRequest extends FormRequest
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
            'ten_nhom' => 'required',
            'id_dot' => 'required',
            'id_nhomtruong' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'ten_nhom.required' => 'Tên nhóm không được bỏ trống',
            'id_dot.required' => 'Bạn chưa chọn đợt',
            'id_nhomtruong.required' => 'Bạn chưa chọn nhóm trưởng',
        
        ];
    }
}
