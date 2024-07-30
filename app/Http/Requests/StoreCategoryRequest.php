<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'ten_danh_muc' => ['required', 'string','max:255'],
            'mo_ta' => ['required', 'string','max:255'],
            'hinh_anh' => ['image','mimes:jpeg,png,jpg']  // only allow jpeg, png, jpg mime types
        ];
    }

    public function messages(): array{
        return [
            'ten_danh_muc.required' => 'Tên danh mục không được để trống.',
            'ten_danh_muc.string' => 'Tên danh mục phải là một chuỗi.',
            'ten_danh_muc.max' => 'Tên danh mục không quá 255 ký tự.',

            'mo_ta.required' => 'Mô tả không được để trống.',
            'mo_ta.string' => 'Mô tả phải là một chuỗi.',
            'mo_ta.max' => 'Mô tả không quá 255 ký tự.',

            'hinh_anh.image' => 'file phải là ảnh',
            'hinh_anh.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg.'  // only allow jpeg, png, jpg mime types
        ];
    }



}
