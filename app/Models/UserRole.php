<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserRole extends Model
{
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
