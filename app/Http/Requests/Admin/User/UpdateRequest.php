<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $this->user_id,
            'user_id' => 'required|exists:users,id',
            'role_id' => 'required|exists:roles,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Это поле обязательно для заполнения',
            'name.string' => 'Данные должны соответствовать строковому типу',
            'email.required' => 'Это поле обязательно для заполнения',
            'email.email' => 'Введите корректный email адрес',
            'email.unique' => 'Этот email уже используется',
            'role_id.required' => 'Это поле обязательно для заполнения',
            'role_id.exists' => 'Нет в базе данных',
        ];
    }
}
