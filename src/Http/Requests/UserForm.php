<?php

namespace Webkul\RestApi\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserForm extends FormRequest
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
        return [
            'name'                  => 'required',
            'email'                 => 'required|email|unique:admins,email,'.$this->id,
            'password'              => 'nullable|min:6|confirmed',
            'password_confirmation' => 'nullable|required_with:password|same:password',
            'status'                => 'sometimes',
            'role_id'               => 'required|exists:roles,id',
            'image'                 => 'array',
            'image.*'               => 'mimes:jpeg,jpg,png,gif|max:10000',
        ];
    }
}
