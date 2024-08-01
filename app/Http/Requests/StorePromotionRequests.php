<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePromotionRequests extends FormRequest
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
        if ($this->loai_khuyen_mai == 'gia_tri') {
            return [
                "ten_khuyen_mai" => ["required", "string", "max:255"],
                'ma_khuyen_mai' => ['required', 'string', 'between:4,12', 'regex:/^[a-zA-Z0-9]+$/'],
                'loai_khuyen_mai' => ['required', 'string', 'in:gia_tri,phan_tram'],
                'gia_tri' => ['required', 'numeric', 'min:1'],
                'so_luong' => ['required', 'numeric', 'min:1'],
                'ngay_bat_dau' => ['required', 'date', 'after:now'],
                'ngay_ket_thuc' => ['required', 'date', 'after:ngay_bat_dau'],
                'mo_ta' => ['nullable', 'string', 'max:255'],

            ];
        } elseif ($this->loai_khuyen_mai == 'phan_tram') {
            return [
                "ten_khuyen_mai" => ["required", "string", "max:255"],
                'ma_khuyen_mai' => ['required', 'string', 'between:4,12', 'regex:/^[a-zA-Z0-9]+$/'],
                'loai_khuyen_mai' => ['required', 'string', 'in:gia_tri,phan_tram'],
                'gia_tri' => ['required', 'numeric', 'min:1', 'max:100'],
                'so_luong' => ['required', 'numeric', 'min:1'],
                'ngay_bat_dau' => ['required', 'date', 'after:now'],
                'ngay_ket_thuc' => ['required', 'date', 'after:ngay_bat_dau'],
                'mo_ta' => ['nullable', 'string', 'max:255'],

            ];
        } else {
            return [
                "ten_khuyen_mai" => ["required", "string", "max:255"],
                'ma_khuyen_mai' => ['required', 'string', 'between:4,12', 'regex:/^[a-zA-Z0-9]+$/'],
                'loai_khuyen_mai' => ['required', 'string', 'in:gia_tri,phan_tram'],
                'gia_tri' => ['required', 'numeric'],
                'so_luong' => ['required', 'numeric', 'min:1'],
                'ngay_bat_dau' => ['required', 'date', 'after:now'],
                'ngay_ket_thuc' => ['required', 'date', 'after:ngay_bat_dau'],
                'mo_ta' => ['nullable', 'string', 'max:255'],
            ];
        }
    }

    public function messages(): array
    {   
        if ($this->loai_khuyen_mai == 'gia_tri') {
            return [
                'ten_khuyen_mai.required' => 'Tên khuyến mãi không được để trống.',
                'ten_khuyen_mai.string' => 'Tên khuyến mãi phải là một chuỗi.',
                'ten_khuyen_mai.max' => 'Tên khuyến mãi không quá 255 ký tự.',
    
                'ma_khuyen_mai.required' => 'Mã khuyến mãi không được để trống.',
                'ma_khuyen_mai.string' => 'Mã khuyến mãi phải là một chuỗi.',
                'ma_khuyen_mai.between' => 'Mã khuyến mãi phải có 4 đến 12 ký tự',
                'ma_khuyen_mai.regex' => 'Mã khuyến mãi chỉ bao gồm chữ cái và số',
    
                'loai_khuyen_mai.required' => 'Loại khuyến mãi không được để trống.',
                'loai_khuyen_mai.string' => 'Loại khuyến mãi phải là một chuỗi.',
                'loai_khuyen_mai.in' => 'Loại khuyến mãi phải là giá trị hoặc phần trăm',
    
                'gia_tri.required' => 'Giá trị khuyến mãi không được để trống.',
                'gia_tri.numeric' => 'Giá trị khuyến mãi phải là một số.',
                'gia_tri.min' => 'Giá trị khuyến mãi phải lớn hơn 0.',
    
                'so_luong.required' => 'Số lượng khuyến mãi không được để trống.',
                'so_luong.numeric' => 'Số lượng khuyến mãi phải là một số.',
                'so_luong.min' => 'Số lượng khuyến mãi phải lớn hơn 0.',
                
                'ngay_bat_dau.required' => 'Ngày bắt đầu khuyến mãi không được để trống.',
                'ngay_bat_dau.date' => 'Ngày bắt đầu khuyến mãi phải là ngày.',
                'ngay_bat_dau.after' => 'Ngày bắt đầu khuyến mãi sau thời gian hiện tại',
    
                'ngay_ket_thuc.required' => 'Ngày kết thúc khuyến mãi không được để trống.',
                'ngay_ket_thuc.date' => 'Ngày kết thúc khuyến mãi phải là ngày.',
                'ngay_ket_thuc.after' => 'Ngày kết thúc khuyến mãi phải lớn hơn ngày bắt đầu',
    
                'mo_ta.string' => 'Mô tả khuyến mãi phải là một chuỗi.',
                'mo_ta.max' => 'Mô tả khuyến mãi không quá 255 ký tự.',
            ];
        } elseif ($this->loai_khuyen_mai == 'phan_tram') {
            return [
                'ten_khuyen_mai.required' => 'Tên khuyến mãi không được để trống.',
                'ten_khuyen_mai.string' => 'Tên khuyến mãi phải là một chuỗi.',
                'ten_khuyen_mai.max' => 'Tên khuyến mãi không quá 255 ký tự.',
    
                'ma_khuyen_mai.required' => 'Mã khuyến mãi không được để trống.',
                'ma_khuyen_mai.string' => 'Mã khuyến mãi phải là một chuỗi.',
                'ma_khuyen_mai.between' => 'Mã khuyến mãi phải có 4 đến 12 ký tự',
                'ma_khuyen_mai.regex' => 'Mã khuyến mãi chỉ bao gồm chữ cái và số',
    
                'loai_khuyen_mai.required' => 'Loại khuyến mãi không được để trống.',
                'loai_khuyen_mai.string' => 'Loại khuyến mãi phải là một chuỗi.',
                'loai_khuyen_mai.in' => 'Loại khuyến mãi phải là giá trị hoặc phần trăm',
    
                'gia_tri.required' => 'Giá trị khuyến mãi không được để trống.',
                'gia_tri.numeric' => 'Giá trị khuyến mãi phải là một số.',
                'gia_tri.max' => ' khi chọn loại khuyến mãi là phần trăm nhập số trong khoảng 1 đến
                                                    100',
    
                'so_luong.required' => 'Số lượng khuyến mãi không được để trống.',
                'so_luong.numeric' => 'Số lượng khuyến mãi phải là một số.',
                'so_luong.min' => 'Số lượng khuyến mãi phải lớn hơn 0.',
                
                'ngay_bat_dau.required' => 'Ngày bắt đầu khuyến mãi không được để trống.',
                'ngay_bat_dau.date' => 'Ngày bắt đầu khuyến mãi phải là ngày.',
                'ngay_bat_dau.after' => 'Ngày bắt đầu khuyến mãi sau thời gian hiện tại',
    
                'ngay_ket_thuc.required' => 'Ngày kết thúc khuyến mãi không được để trống.',
                'ngay_ket_thuc.date' => 'Ngày kết thúc khuyến mãi phải là ngày.',
                'ngay_ket_thuc.after' => 'Ngày kết thúc khuyến mãi phải lớn hơn ngày bắt đầu',
    
                'mo_ta.string' => 'Mô tả khuyến mãi phải là một chuỗi.',
                'mo_ta.max' => 'Mô tả khuyến mãi không quá 255 ký tự.',
            ];
        } else {
            return [
                'ten_khuyen_mai.required' => 'Tên khuyến mãi không được để trống.',
                'ten_khuyen_mai.string' => 'Tên khuyến mãi phải là một chuỗi.',
                'ten_khuyen_mai.max' => 'Tên khuyến mãi không quá 255 ký tự.',
    
                'ma_khuyen_mai.required' => 'Mã khuyến mãi không được để trống.',
                'ma_khuyen_mai.string' => 'Mã khuyến mãi phải là một chuỗi.',
                'ma_khuyen_mai.between' => 'Mã khuyến mãi phải có 4 đến 12 ký tự',
                'ma_khuyen_mai.regex' => 'Mã khuyến mãi chỉ bao gồm chữ cái và số',
    
                'loai_khuyen_mai.required' => 'Loại khuyến mãi không được để trống.',
                'loai_khuyen_mai.string' => 'Loại khuyến mãi phải là một chuỗi.',
                'loai_khuyen_mai.in' => 'Loại khuyến mãi phải là giá trị hoặc phần trăm',
    
                'gia_tri.required' => 'Giá trị khuyến mãi không được để trống.',
                'gia_tri.numeric' => 'Giá trị khuyến mãi phải là một số.',
    
                'so_luong.required' => 'Số lượng khuyến mãi không được để trống.',
                'so_luong.numeric' => 'Số lượng khuyến mãi phải là một số.',
                'so_luong.min' => 'Số lượng khuyến mãi phải lớn hơn 0.',
                
                'ngay_bat_dau.required' => 'Ngày bắt đầu khuyến mãi không được để trống.',
                'ngay_bat_dau.date' => 'Ngày bắt đầu khuyến mãi phải là ngày.',
                'ngay_bat_dau.after' => 'Ngày bắt đầu khuyến mãi sau thời gian hiện tại',
    
                'ngay_ket_thuc.required' => 'Ngày kết thúc khuyến mãi không được để trống.',
                'ngay_ket_thuc.date' => 'Ngày kết thúc khuyến mãi phải là ngày.',
                'ngay_ket_thuc.after' => 'Ngày kết thúc khuyến mãi phải lớn hơn ngày bắt đầu',
    
                'mo_ta.string' => 'Mô tả khuyến mãi phải là một chuỗi.',
                'mo_ta.max' => 'Mô tả khuyến mãi không quá 255 ký tự.',
            ];
        }
       
    }
}
