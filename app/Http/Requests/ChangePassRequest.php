<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePassRequest extends FormRequest
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
        $method = $this->route()->getActionMethod(); // lấy action mà route đó đang dùng
        switch ($this->method()) {
            case 'POST':
                switch ($method) {
                    case 'ChangePassEdit':
                        $rules = [
                            'password' => 'required',
                            'passwordnew' => 'required',
                            'passwordconfirm' => 'required',
                        ];
                        break;
                    default;
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
            'password.required' => 'Vui Lòng nhâp mật khẩu',
            'passwordnew.required' => 'Vui Lòng nhâp mật khẩu mới',
            'passwordconfirm.required' => 'Vui Lòng xác nhận  mật khẩu',
        ];
    }
}
