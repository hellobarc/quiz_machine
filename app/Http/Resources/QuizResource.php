<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuizResource extends JsonResource
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
            'exam_id' => $this->exam_id,
            'title' => $this->title,
            'instruction' => $this->instruction,
            'quiz_type' => $this->quiz_type,
            'marks' => $this->marks,
            'status' => $this->status,
            
        ];


    }
}
