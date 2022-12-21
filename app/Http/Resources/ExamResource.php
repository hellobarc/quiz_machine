<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExamResource extends JsonResource
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
            'title' => $this->title,
            'level_id' => $this->level_id,
            'category_id' => $this->category_id,
            'thumbnail' => $this->thumbnail,
            'short_discription' => $this->short_discription,
            'instruction' => $this->instruction,
            'time_limit' => $this->time_limit,
            
        ];


    }
}
