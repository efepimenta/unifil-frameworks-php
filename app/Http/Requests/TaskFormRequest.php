<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TaskFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !Auth::guest();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'O campo título é obrigatório',
            'description.required' => 'O campo descrição é obrigatório',
            'status.required' => 'O campo status é obrigatório',
        ];
    }
}
