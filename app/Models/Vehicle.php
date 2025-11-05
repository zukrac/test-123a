<?php

namespace App\Models;

use App\Http\Resources\VehicleModelResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function model(): BelongsTo
    {
        return $this->belongsTo(VehicleModel::class);
    }

    public function scopeSearch(Builder $query, ?string $q = null, ?float $latitude = null, ?float $longitude = null, ?int $distance = null): Builder
    {
        if ($q) {
            $query->where('name', 'like', '%' . $q . '%');
        }

        // TODO: Implement geosearch to use latitude, longitude and distance

        return $query;
    }
}
