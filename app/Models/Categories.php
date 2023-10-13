<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Categories extends Model
{
    public $timestamps = false;

    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany(Ingredients::class);
    }
}
