<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveExamRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title'             => 'required|string',
            'level_id'          => 'required|integer',
            'category_id'       => 'required|integer',
            'thumbnail'         => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'short_description' => 'nullable|string',
            'instruction'       => 'required|string',
            'time_limit'        => 'required|integer',
        ];
    }
}
