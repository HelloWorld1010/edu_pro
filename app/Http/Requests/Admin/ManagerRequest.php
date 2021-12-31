<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ManagerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //验证规则
        return [
            'username' => 'required|unique:manager|min:2|max:20',
            'mobile' => 'required|min:8|max:11',
            'email' => 'required|unique:manager',
            'role_id' => 'required',
            'gender' => 'required',
            'password' => 'required|min:6|confirmed'
        ];
    }
}
