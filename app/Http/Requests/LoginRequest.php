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
                        break;
                    case 'register':
                        $rules = [
                            'name' => 'required',
                            'email' => 'required|unique:users,email', // unique:users,email là chỉ có 1 email
                            // duy nhất trong bảng users  không được trùng email
                            'password' => 'required',
                            'enterpassword' => 'required',
                            'gender' => 'required',
                        ];
                        break;
                    case 'ConfrimMail':
                        $rules = [
                            'maxacnhan' => 'required',
                        ];
                        break;
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
            'email.required' => 'Vui Lòng Nhập Email',
            'email.unique' => 'Email đã được đăng ký',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'name.required'=>'Thông tin không được bỏ trống',
            'enterpassword.required'=>'Thông tin không được bỏ trống',
            'gender.required'=>'Thông tin không được bỏ trống',

        ];
    }
}
