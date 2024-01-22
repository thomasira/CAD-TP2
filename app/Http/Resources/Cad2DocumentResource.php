<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Cad2DocumentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $default = 'fr';
        $locale = $default;
        if(session()->get('locale')) $locale = session()->get('locale');
        return [
            'id' => $this->id,
            'name' => isset(json_decode($this->name)->$locale) && json_decode($this->name)->$locale != "" ? json_decode($this->name)->$locale : json_decode($this->name)->$default,
            'author' => $this->student->name,
            'date' => date_format($this->updated_at, 'Y-m-d')
        ];
    }
}
