<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property mixed $id
 * @property mixed $name
 * @property mixed $brand_id
 */
class VehicleModel extends Model
{
    protected $table = 'vehicle_models';
    protected $fillable = ['name', 'brand_id'];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }
    public function vehicles(): HasMany
    {
        return $this->hasMany(Vehicle::class);
    }
}
