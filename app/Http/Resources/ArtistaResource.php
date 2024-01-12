<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArtistaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'ID do Artista' => $this->constituentID,
            'Nome' => $this->displayName,
            'Bio do Artista' => $this->artistBio,
            'Nacionalidade' => $this->nationality,
            'Nascimento' => $this->beginDate,
            'Falescimento' => $this->endDate,
        ];
    }
}
