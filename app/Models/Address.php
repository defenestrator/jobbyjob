<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
/**
 * @property int $id
 * @property int $addressable_id
 * @property string $addressable_type
 * @property string $location
 * @property string $address_1
 * @property string $address_2
 * @property string $city
 * @property string $country
 * @property string $postcode
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Address extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'addressable_id',
        'addressable_type',
        'location',
        'address_1',
        'address_2',
        'city',
        'country',
        'postcode',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'addressable_id' => 'integer',
    ];

    public function addressable()
    {
        return $this->morphTo();
    }
}
