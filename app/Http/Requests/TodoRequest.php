<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool

    public function authorize()
    {
        //coming
    }
    */

    /**
     * Get the validation rules for creating todo.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:100'],
            'desc' => ['required', 'string', 'max:1000'],
        ];
    }
}

