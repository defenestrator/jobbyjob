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
        $this->morphToMany('App\Models\Skill','skillable');
    }
}
