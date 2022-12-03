<?php

namespace Modules\Locations\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer $id
 * @property string $name
 * @property float $price
 * @property string $shipping
 * @property integer $country_id
 * @property string $lat
 * @property string $lang
 * @property string $created_at
 * @property string $updated_at
 * @property Project[] $projects
 */
class City extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['name', 'price', 'shipping', 'country_id', 'lat', 'lang', 'created_at', 'updated_at'];

    /**
     * @return HasMany
     */
    public function projects(): HasMany
    {
        return $this->hasMany('Modules\Locations\Entities\Project');
    }

    /**
     * @return BelongsTo
     */
    public  function  country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function areas(): HasMany
    {
        return $this->hasMany(Area::class, 'city_id');
    }
}
