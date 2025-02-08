<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SpaceTypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'Identificador' => $this->id,
            'Nombre' => $this->description_ES,
            'Nombre_CA' => $this->description_CA,
            'Nombre_ES' => $this->description_ES,
            'Nombre_EN' => $this->description_EN,
            'Fecha de creación' => Carbon::parse($this->created_at)->format("d-m-Y h:m:s"),
            'Última actualización' => Carbon::parse($this->created_at)->format("d-m-Y h:m:s"),
        ];return parent::toArray($request);
    }
}
