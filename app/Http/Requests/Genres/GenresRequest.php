<?php

namespace App\Http\Requests\Genres;

use Illuminate\Foundation\Http\FormRequest;

class GenresRequest extends FormRequest
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
        $validation = ['required'];
        if($this->isMethod('post')) array_push($validation,'unique:genres');
        return [
            'name' => $validation
        ];
    }
}
