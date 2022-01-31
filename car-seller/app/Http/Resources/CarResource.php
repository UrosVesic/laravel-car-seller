<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\BrandResource;

class CarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'car';

    public function toArray($request)
    {
        return [
            'id'=>$this->resource->id,
            'model'=>$this->resource->model,
            'cc'=>$this->resource->cc,
            'hp'=>$this->resource->hp,
            'brand'=>new BrandResource($this->resource->brand),
        ];
    }
}
