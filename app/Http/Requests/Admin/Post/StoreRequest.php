<?php

namespace App\Http\Requests\Admin\Post;

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
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'required|file',
            'main_image' => 'required|file',
            'category_id' => 'integer|exists:categories,id',
            'tag_id' => 'required|array',
            'tag_id.*' => 'exists:tags,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле обязательно для заполнения',
            'title.string' => 'Данные должны соответствовать строковому типу',
            'content.required' => 'Это поле обязательно для заполнения',
            'content.string' => 'Данные должны соответствовать строковому типу',
            'preview_image.required' => 'Это поле обязательно для заполнения',
            'preview_image.file' => 'Необходимо выбрать файл',
            'main_image.required' => 'Это поле обязательно для заполнения',
            'main_image.file' => 'Необходимо выбрать файл',
            'category_id.integer' => 'Ожидается число',
            'category_id.exists' => 'Нет в базе данных',
            'tag_id.required' => 'Это поле обязательно для заполнения',
            'tag_id.array' => 'Необходимо отправить массив данных',
            'tag_id.exists' => 'Нет в базе данных',
        ];
    }
}
