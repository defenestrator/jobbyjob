<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property bool $active
 * @property string $stack_overflow
 * @property string $cv
 * @property string $phone
 * @property string $github
 * @property string $linked_in
 * @property string $facebook
 * @property string $instagram
 * @property string $twitter
 * @property string $snapchat
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Resume extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'active',
        'stack_overflow',
        'cv',
        'phone',
        'github',
        'linked_in',
        'facebook',
        'instagram',
        'twitter',
        'snapchat',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'active' => 'boolean',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}