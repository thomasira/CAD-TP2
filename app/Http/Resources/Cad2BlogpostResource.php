<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Cad2BlogpostResource extends JsonResource
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
            'title' => isset(json_decode($this->title)->$locale) && json_decode($this->title)->$locale != "" ? json_decode($this->title)->$locale : json_decode($this->title)->$default,
            'article' => isset(json_decode($this->article)->$locale) && json_decode($this->article)->$locale != ""? json_decode($this->article)->$locale : json_decode($this->article)->$default,
            'author' => $this->student->name
        ];
    }
}
