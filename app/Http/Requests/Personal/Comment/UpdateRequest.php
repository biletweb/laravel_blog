<?php

namespace App\Http\Requests\Personal\Comment;

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
            'comment' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'comment.required' => 'Это поле обязательно для заполнения',
            'comment.string' => 'Данные должны соответствовать строковому типу',
        ];
    }
}
