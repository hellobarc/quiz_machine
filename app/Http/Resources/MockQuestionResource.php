<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MockQuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return [
            'mock_id'           => $this->mock_name,
            'question_title'    => $this->question_title,
            'question_type'     => $this->question_type,
            'module'            => $this->module,
            'passage_id'        => $this->passage_id,
        ];


    }
}
