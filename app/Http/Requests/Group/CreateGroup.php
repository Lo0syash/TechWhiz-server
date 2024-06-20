<?php

namespace App\Http\Requests\Group;

use Illuminate\Foundation\Http\FormRequest;

class CreateGroup extends FormRequest
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
            'shortDescription' => 'required|string|min:5|max:255',
            'activity' => 'required|string|min:2|max:255',
            'description' => 'required|string|min:5|max:999999',
            'status' => 'required|string',
            'path' => 'image|max:5120',
            'inviteCode' => 'string|min:2|max:255'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Все поля должны быть заполнены',
        ];
    }
}
