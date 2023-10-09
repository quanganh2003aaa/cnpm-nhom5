<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8|max:16',
            'tel' => 'required|min:10|max:10'
        ];
    }
    public function messages()
    {
        return [
            'email.unique' => 'Email đã tồn tại',
            'password.min' => 'Mật khẩu tối thiểu 8 kí tự',
            'password.max' => 'Mật khẩu tối đa 16 kí tự',
            'email.required' => 'Email là bắt buộc',
            'name.required' => 'Tên là bắt buộc',
            'password.required' => 'Mật khẩu là bắt buộc',
            'tel.required' => 'Số điện thoại là bắt buộc',
            'tel.min' => 'Số điện thoại không đúng định dạng',
            'tel.max' => 'Số điện thoại không đúng định dạng'
        ];
    }
}
