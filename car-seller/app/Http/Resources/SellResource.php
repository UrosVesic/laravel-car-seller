<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SellResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'sell';

    public function toArray($request)
    {
        return [
            'id'=>$this->resource->id,
            'user'=>new UserResource($this->resource->user),
            'car'=>$this->resource->car,

        ];
    }
}
