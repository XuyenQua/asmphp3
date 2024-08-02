<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBannerRequests extends FormRequest
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
            "ten_banner" => ['required', 'string', 'max:255'],
            'hinh_anh' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'vi_tri' => ['required', 'string', 'in:top,middle,bottom'],
        ];
    }

    public function messages(): array
    {
        return [
            'ten_banner.required' => 'Tên banner không được để trống.',
            'ten_banner.string' => 'Tên banner phải là một chuỗi.',
            'ten_banner.max' => 'Tên banner không quá 255 ký tự.',

            'hinh_anh.required' => 'Hình ảnh không được để trống.',
            'hinh_anh.image' => 'file phải là ảnh',
            'hinh_anh.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg.',
            'hinh_anh.max'=> 'vui lòng tải file ảnh không quá 2048 mb',



            'vi_tri.required' => 'vị trí không được để trống.',
            'vi_tri.string' => 'vị trí phải là một chuỗi.',
            'vi_tri.in' => 'vị trí phải chọn 1 trong : trên , giữa , dưới ',


        ];
    }
}
