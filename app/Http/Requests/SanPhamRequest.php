<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SanPhamRequest extends FormRequest
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
                    case 'addSanPham':
                        $rules = [
                            'name' => 'required|string',
                            'hinh'=>'required|image',
                            'gia'=>'required|numeric',
                            'sl'=>'required|numeric',
                            'hangloai'=>'required',
                            'mota'=>'required',
                        ];
                        break;

                    case 'editSanPham':
                        $rules = [
                            'name' => 'required|string',
                            'hinh'=>'nullable',
                            'gia'=>'required|numeric',
                            'sl'=>'required|numeric',
                            'hangloai'=>'nullable',
                            'mota'=>'required',
                        ];
                        break;
                }
                break;
        }
        return $rules;
    }
}
