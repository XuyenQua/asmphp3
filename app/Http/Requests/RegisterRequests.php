<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequests extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ten_nguoi_dung' => ['required','string','max:255'],
            'email' => ['required', 'email','max:255'],
            'mat_khau' => ['required','string','min:6','regex:/^[a-zA-Z0-9]+$/'] 
        ];
    }

    public function messages(): array
    {
        return [
            'ten_nguoi_dung.required' => 'Vui lòng nhập tên người dùng',
            'ten_nguoi_dung.string' => 'Tên người dùng phải là chuỗi',
            'ten_nguoi_dung.max' => 'Tên người dùng không quá 255 ký tự',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không đúng định dạng',
            'email.max' => 'Email không quá 255 ký tự',
            'mat_khau.required' => 'Vui lòng nhập mật khẩu',
            'mat_khau.string' => 'Mật khẩu phải là chuỗi',
            'mat_khau.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
            'mat_khau.regex' => 'Mật khẩu chỉ gồm chữ cái và số'
        ];
    }
}
