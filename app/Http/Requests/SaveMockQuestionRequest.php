<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveMockQuestionRequest extends FormRequest
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
            'mock_id'           => 'required|integer',
            'question_title'    => 'required|string',
            'question_type'     => 'required|string',
            'module'            => 'required|string',
            'passage_id'        => 'required|integer',
        ];
    }
}
