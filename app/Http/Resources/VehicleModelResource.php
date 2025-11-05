<?php

namespace App\Http\Resources;

use App\Models\Vehicle;
use App\Models\Phone;
use App\Models\VehicleModel;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(schema="VehicleModel", description="Компания", properties={
 *     @OA\Property(property="id", type="integer", description="ID"),
 *     @OA\Property(property="name", type="string", description="Название"),
 *     @OA\Property(property="brand_id", type="integer", description="ID бренда"),
 * })
 *
 * @property VehicleModel $resource
 */
class VehicleModelResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $model = $this->resource;
        return [
            'id' => $model->id,
            'name' => $model->name,
            'brand_id' => $model->brand_id,
        ];
    }
}
