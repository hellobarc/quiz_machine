<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MockResource extends JsonResource
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
            'mock_name' => $this->mock_name,
            'slug' => $this->slug,
        ];


    }
}
