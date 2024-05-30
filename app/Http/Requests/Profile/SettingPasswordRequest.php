<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class SettingPasswordRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'password' => 'required|string|min:6|max:255|same:re_new_password',
            'old_password' => 'required|string|min:6|max:255',
            're_new_password' => 'required|string|min:6|max:255',
        ];
    }
    public function messages()
    {
        return [
            'same' => 'Подтвердите пароль',
            'password.min' => 'Минимальное количество символов - 6',
        ];
    }
}
