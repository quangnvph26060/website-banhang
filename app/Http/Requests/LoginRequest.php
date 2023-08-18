<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [];
        $method = $this->route()->getActionMethod(); // action mà route đó đang sử dụng
        switch ($this->method()) {
            case 'POST':
                switch ($method) {
                    case 'login':
                        $rules = [
                            'password' => 'required',
                            'email' => 'required',
                        ];
                }
                break;
            default:
                break;
        }
        return $rules;
    }
    public function messages()
    {
        return [
            'email.required'=>'Vui Lòng Nhập Email',
            'password.required'=>'Vui lòng nhập mật khẩu',
        ];
    }
}
