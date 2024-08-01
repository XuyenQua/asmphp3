<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'ten_san_pham' => ['required', 'string', 'max:255'],
            'gia' => ['required', 'numeric', 'min:1'],
            'danh_muc_id' => ['required'],
            'so_luong' => ['required', 'integer', 'min:1'],
            'mo_ta_ngan' => ['nullable', 'string'],
            'chi_tiet_san_pham' => ['required','string'],
            'hinh_anh' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],

        ];
    }

    public function messages(): array
    {
        return [
            'ten_san_pham.required' => 'Tên sản phẩm không được để trống',
            'ten_san_pham.max' => 'Tên sản phẩm không được quá 255ký tự',
            'danh_muc_id.required' => 'danh mục không được để trống',
            'gia.required' => 'Giá sản phẩm không được để trống',
            'gia.numeric' => 'Giá sản phẩm phải là số',
            'gia.min' => 'Giá sản phẩm phải lớn hơn 0',
            'so_luong.required' => 'Số lượng sản phẩm không được để trống',
            'so_luong.integer' => 'Số lượng sản phẩm phải là số nguyên',
            'so_luong.min' => 'Số lượng sản phẩm phải lớn hơn 0',
            'hinh_anh.required' => 'ảnh chưa được chọn',
            'hinh_anh.image' => 'File tải lên phải là ảnh',
            'hinh_anh.mimes' => 'Chỉ chấp nhận các định dạng ảnh: jpeg, png, jpg, gif',
            'hinh_anh.max' => 'Kích thước ảnh không được quá 2048mb',
            'chi_tiet_san_pham.required' => 'chi tiết sản phẩm không được để trống',

        ];
    }
}
