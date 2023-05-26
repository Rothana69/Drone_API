<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DroneResource extends JsonResource
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
            'type'=> $this->type,
            'battery_life'=>$this->battery_life,
            'weight'=>$this->weight,
            'payload'=>$this->payload,
            'max_speed' => $this->max_speed,
            'max_altitude'=>$this->max_altitude,
            'user_id'=>$this->user_id,
            'plan_id' => $this->plan_id,
        ];

    }
}
