<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'name' => 'sometimes',
            'tel' => 'required|min:9|max:10',
            'address' => 'required|max:255',
            'product' => 'required',
            'note' => 'sometimes',
            'sumPrice' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'address.required' => 'Địa chỉ là bắt buộc',
            'tel.required' => 'Số điện thoại là bắt buộc',
            'address.max' => 'Địa chỉ tối đa 255 kí tự',
            'tel.max' => 'Số điện thoại không hợp lệ',
            'tel.min' => 'Số điện thoại không hợp lệ',
            'product.required' => 'Giỏ hàng của bạn bị lỗi',
            'sumPrice.required' => 'Tổng tiền là bắt buộc'
        ];
    }
}
