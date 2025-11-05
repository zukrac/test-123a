<?php

namespace App\Http\Resources;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(schema="VehicleResource", description="Транспортное средство", properties={
 *     @OA\Property(property="id", type="integer", description="ID"),
 *     @OA\Property(property="brand", ref="#/components/schemas/BrandResource"),
 *     @OA\Property(property="model", ref="#/components/schemas/VehicleModel"),
 *     @OA\Property(property="mileage", type="integer", description="Пробег"),
 *     @OA\Property(property="color", type="string", description="Цвет"),
 * })
 *
 * @property Vehicle $resource
 */
class VehicleResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $vehicle = $this->resource;
        return [
            'id' => $vehicle->id,
            'brand' => BrandResource::make($vehicle->brand),
            'model' => VehicleModelResource::make($vehicle->model),
            'mileage' => $vehicle->mileage,
            'color' => $vehicle->color,
            'manufactured_at' => $vehicle->manufactured_at,
        ];
    }
}
