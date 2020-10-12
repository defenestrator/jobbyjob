<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
/**
 * @property int $id
 * @property int $team_id
 * @property string $title
 * @property string $tagline
 * @property string $description
 * @property bool $remote
 * @property string $compensation
 * @property \Carbon\Carbon $published
 * @property \Carbon\Carbon $expires
 * @property string $type
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Position extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'team_id',
        'title',
        'tagline',
        'description',
        'remote',
        'compensation',
        'expires',
        'published',
        'type',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'team_id' => 'integer',
        'remote' => 'boolean',
        'compensation' => 'array',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'expires',
        'published',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
        return $this->belongsTo(\App\Models\Team::class);
    }

    public function edits()
    {
        return $this->morphMany('App\Models\Edit', 'editable');
    }

    public function skills()
    {
        return $this->morphToMany('App\Models\Skill','skillable');
    }

    public function scopeActive($query)
    {
        return $query->where([ ['expires', '!=', null], ['published', '!=', null] ] );
    }
}
