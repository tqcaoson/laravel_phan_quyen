<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class EditUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::user()->can('user-edit'))
            return true;
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
            'name' => 'required',
            'password' => 'same:confirm_password',
            'roles' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên người dùng  không được trống',
            'password.same' => 'Password nhập lại không khớp',
            'roles.required' => 'Vai trò không được trống'
        ];
    }
}