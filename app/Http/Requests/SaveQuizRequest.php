<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveQuizRequest extends FormRequest
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
            'exam_id' => 'required|integer',
            'title' => 'required|string',
            'instruction' => 'required|string',
            'quiz_type' => 'required|string',
            'marks' => 'required|integer',
            'status' => 'required|string',
        ];
    }
}
