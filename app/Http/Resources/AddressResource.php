<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Resources\ZoneResource;
use App\Http\Resources\MunicipalityResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);

        return[
            'Identificador' => $this->id,
            'Domicilio' => $this->name,
            'Fecha de creación' => Carbon::parse($this->created_at)->format("d-m-Y h:m:s"),
            'Última actualización' => Carbon::parse($this->created_at)->format("d-m-Y h:m:s"),
            'Zona' => new ZoneResource($this->whenLoaded('zone')),
            'Municipio' => new MunicipalityResource($this->whenLoaded('municipality')),

        ];
    }
}
