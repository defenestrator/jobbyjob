<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Defenestrator\Traits\Immutable;

class Edit extends Model
{
    use HasFactory;
    use Immutable;

    protected $checkHash = true;

    protected $guarded = ['state', 'hash'];

    public function editable()
    {
        return $this->morphTo();
    }
}
