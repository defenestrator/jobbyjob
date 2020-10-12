<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
/**
 * @property int $id
 * @property int $user_id
 * @property bool $active
 * @property string $stack_overflow
 * @property string $cv
 * @property string $phone
 * @property string $github
 * @property string $linked_in
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Resume extends Model
{
    use HasFactory;
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


    public function edits()
    {
        return $this->morphMany('App\Models\Edit', 'editable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function skills()
    {
        return $this->morphToMany(Skill::class,'skillable');
    }

    public function address()
    {
        return $this->morphOne(App\Models\Address::class, 'adddressable');
    }
}
