<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DroneRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=> 'required|unique:drones',
            'type'=> 'required',
            'battery_life'=>'required|integer|',
            'weight'=>'required|float',
            'payload'=>'required|float',
            'max_speed' => 'required|float',
            'max_altitude'=>'required|float',
            'user_id'=>'required',
            'plan_id' => 'required',
            Rule::unique('drones')->ignore($this->id),
        ];
    }
}
