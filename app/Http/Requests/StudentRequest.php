<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
           
            'ten_congty'=>'required',
            'dia_chi' => 'required',

        ];
    }
    
    public function messages()
    {
        return [
            'dia_chi.required' => 'Địa chỉ không được bỏ trống',
          
            'ten_congty.required' => 'Tên công ty không được bỏ trống',
          
        ];
    }
}
