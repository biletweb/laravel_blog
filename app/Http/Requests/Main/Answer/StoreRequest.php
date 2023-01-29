<?php

namespace App\Http\Requests\Main\Answer;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'answer_comment' => 'required|string',
            'comment_id' => 'required|integer',
            'user_id' => 'required|integer',
        ];
    }
}
