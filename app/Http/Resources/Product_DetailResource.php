<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product_DetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'category_id' => $this->category_id,
            'layout_id' => $this->layout_id,
            'price' => $this->price,
            'after_dis' => $this->after_dis,
            'product__images' => $this->product__images,
        ];
    }
}
