<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
        $method = $this->route()->getActionMethod();// action của  route đó
        switch ($this->method()) { // phương thức
            case 'POST':
                switch ($method) {
                    case 'addBanner':
                        $rules = [

                            'hinh' => 'required'
                        ];
                        break;
                    case 'editBanner':
                        $rules = [
                            'hinh' => 'nullable'
                        ];
                        break;
                }
                break;
        }
        return $rules;
    }
    public function messages()
    {
        return [

            'hinh' => 'Bạn chưa chọn hình',
        ];
    }
}
