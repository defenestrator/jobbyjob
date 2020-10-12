<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
/**
 * @property int $id
 * @property int $resume_id
 * @property bool $stack_overflow
 * @property bool $cv
 * @property bool $address
 * @property bool $phone
 * @property bool $github
 * @property bool $linked_in
 * @property bool $facebook
 * @property bool $instagram
 * @property bool $twitter
 * @property bool $snapchat
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class ResumeSetting extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'resume_id',
        'stack_overflow',
        'cv',
        'address',
        'phone',
        'github',
        'linked_in',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'resume_id' => 'integer',
        'stack_overflow' => 'boolean',
        'cv' => 'boolean',
        'address' => 'boolean',
        'phone' => 'boolean',
        'github' => 'boolean',
        'linked_in' => 'boolean',
        'facebook' => 'boolean',
        'instagram' => 'boolean',
        'twitter' => 'boolean',
        'snapchat' => 'boolean',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }
}
