<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegRequest extends FormRequest
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
            'name' => 'required|string|min:2|max:255',
            'surname' => 'required|string|min:2|max:255',
            'email' => 'required|string|min:5|max:255|email:rfc,filter|unique:users,email',
            'login' => 'required|string|min:2|max:255|unique:users,login',
            'password' => 'required|string|min:6|max:255|same:re_password',
            're_password' => 'required|string|min:6|max:255',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Обязательное поле',
            'email.email' => 'Неверный формат email',
            'email.unique' => 'Данный email уже зарегистрирован',
            'login.unique' => 'Данный логин уже зарегистрирован',
            'same' => 'Подтвердите пароль',
            'password.min' => 'Минимальное количество символов - 6',
        ];
    }
}
