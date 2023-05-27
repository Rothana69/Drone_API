<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name'=> $this->name,
            'date_time'=> $this->date_time,
            'area'=> $this->area,
            'altitude'=> $this->altitude,
            // 'user_id'=> $this->user_id,
            'user_id'=> new UserResource($this->user),

        ];
    }
}
