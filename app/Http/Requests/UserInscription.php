<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserInscription extends Request
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
        return ['nom' => 'required|max:255|unique:users',
            'mail' => 'required|email|max:255|unique:users',
            'code' => 'required|confirmed|min:6'];
    }
}
