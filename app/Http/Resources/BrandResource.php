<?php

namespace App\Http\Resources;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(schema="BrandResource", description="Компания", properties={
 *     @OA\Property(property="id", type="integer", description="ID соглашения"),
 *     @OA\Property(property="name", type="string", description="Название бренда"),
 * })
 *
 * @property Brand $resource
 */
class BrandResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $brand = $this->resource;
        return [
            'id' => $brand->id,
            'name' => $brand->name,
        ];
    }
}
