<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'ID do Objeto' => $this->objectID,
            'Titulo' => $this->title,
            'Classificacao' => $this->classification,
            'Medium' => $this->medium,
            'Departamento' => $this->department,
            'Dimensoes' => $this->dimensions,
            'Link' => $this->url,
            'Creditos' => $this->creditLine
        ];
    }
}
