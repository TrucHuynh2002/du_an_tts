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
            'hoten_sv' => 'required',
            'mat_khau' => 'required|min:8',
            'nhap_lai_mat_khau' => 'required|same:mat_khau',
            'email' => 'required|email|unique|regex:/(.+)@(.+)\.(.+)/i',
            'sdt' => 'required|unique|min:10',
            'ten_dot' => 'required',
            'ten_congty'=>'required',
            'dia_chi' => 'required|unique',
            'img' => 'image',
            'ten_congviec' => 'required',
            'ten_nhom' => 'required',
            'de_tai' => 'required',
            'id_nhomtruong' => 'required',
            'id_dot' => 'required',
            'id_chucvu' => 'required',
            'id_congty' => 'required'
        ];
    }
    
    public function messages()
    {
        return [
            'hoten_sv.required' => 'Họ tên không được bỏ trống',
            'mat_khau.required' => 'Mật khẩu không được bỏ trống',
            'mat_khau.min' => 'Mật khẩu ít nhất phải 8 ký tự',
            'nhap_lai_mat_khau.required' => 'Không được bỏ trống',
            'nhap_lai_mat_khau.same' => 'Mật khẩu không trùng khớp',
            'email.required' => 'Email không được bỏ trống',
            'email.email' => 'Vui lòng nhập đúng địa chỉ email',
            'email.unique' => 'Email đã tồn tại',
            'email.regex' => 'Vui lòng nhập đúng định dạng email. vd:abc@gmail.com',
            'sdt.required' => 'Số điện thoại không được bỏ trống',
            'sdt.unique' => 'Số điện thoại đã tồn tại',
            'sdt.min' => 'Số điện thoại phải 10 số',
            'dia_chi.required' => 'Địa chỉ không được bỏ trống',
            'diachi.unique' => 'Địa chỉ này đã tồn tại',
            'ten_dot.required' => 'Tên đợt không được bỏ trống',
            'ten_congty.required' => 'Tên công ty không được bỏ trống',
            'img.image' => 'Tệp phải là hình ảnh',
            'ten_congviec.required' => 'Tên công việc không được bỏ trống',
            'ten_nhom.required' => 'Tên nhóm không được bỏ trống',
            'de_tai.required' => 'Đề tài không được bỏ trống',
            'id_nhomtruong.required' => 'Vui lòng lựa chọn nhóm trưởng',
            'id_dot.required' =>'Vui lòng lựa chọn đợt',
            'id_chucvu.required' => 'Vui lòng lựa chọn chức vụ',
            'id_congty' => 'Vui lòng lựa chọn công ty'
        ];
    }
}
