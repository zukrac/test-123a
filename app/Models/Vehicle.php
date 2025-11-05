<?php

namespace App\Models;

use App\Http\Resources\VehicleModelResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property string $name
 * @property Brand|null $brand
 * @property VehicleModelResource|null $model
 * @property string $manufactured_at
 * @property int $mileage
 * @property mixed $color
 */
class Vehicle extends Model
{
    /** @use HasFactory<\Database\Factories\VehicleFactory> */
    use HasFactory;

    protected $table = 'vehicles';
    protected $fillable = ['name', 'brand_id', 'vehicle_model_id', 'manufactured_at', 'mileage', 'color'];

    public function brand(): HasOne
    {
        return $this->hasOne(Brand::class);
    }

    public function model(): HasOne
    {
        return $this->hasOne(VehicleModelResource::class);
    }
}
