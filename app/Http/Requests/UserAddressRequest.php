<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'province'      => 'required',
            'city'          => 'required',
            'area'      => 'required',
            'address'       => 'required',
            'zip_code'           => 'required',
            'name'  => 'required',
            'phone' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'province'      => '省份',
            'city'          => '城市',
            'area'      => '地区',
            'address'       => '详细地址',
            'zip_code'           => '邮编编码',
            'name'  => '姓名',
            'phone' => '电话',
        ];
    }
}
