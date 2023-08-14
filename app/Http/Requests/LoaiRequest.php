<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoaiRequest extends FormRequest
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
                    case 'addLoai':
                        $rules = [
                            'tenloai' => 'required|unique:loai,tenloai',
                            'hinh' => 'required'
                        ];
                        break;
                    case 'editLoai':
                        $rules = [
                            'tenloai' => 'required|unique:loai,tenloai,'.$this->id.'id',
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
            'tenloai' => 'Tên loại không được trống',
            'tenloai.unique' => 'Tên loại đã tồn tại',
            'hinh' => 'Bạn chưa chọn hình',
        ];
    }
}
