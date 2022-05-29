<?php

namespace App\Http\Resources\Api\V1\Application;

use App\Models\Application;
use Illuminate\Http\Resources\Json\JsonResource;

class ApplicationResource extends JsonResource
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
            'user_id' => $this->user_id,
            'address' => $this->address,
            'full_name' => $this->fullname,
            'birth_date' => $this->birth_date,
            'status' => $this->birth_date,
            'applicationable' => $this->applicationable,
        ];
    }
}
