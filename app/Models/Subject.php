<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory;

    public function marks(): HasMany
    {
        return $this->hasMany(Mark::class);
    }


    public function scopeFilter(Builder $query): void
    {
        $query->orderby('name', 'asc');
    }
}
