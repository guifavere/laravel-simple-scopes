<?php

namespace GuiFavere\LaravelSimpleScopes;

use Illuminate\Database\Eloquent\Builder;

/**
 * @method static Builder from(string $date)
 * @method static Builder to(string $date)
 * @method static Builder modifiedFrom(string $date)
 * @method static Builder modifiedTo(string $date)
 */
trait SimpleScopes
{
    public function scopeFrom(Builder $query, string $date): Builder
    {
        return $query->whereDate('created_at', '>=', $date);
    }

    public function scopeTo(Builder $query, string $date): Builder
    {
        return $query->whereDate('created_at', '<=', $date);
    }

    public function scopeModifiedFrom(Builder $query, string $date): Builder
    {
        return $query->whereDate('updated_at', '>=', $date);
    }

    public function scopeModifiedTo(Builder $query, string $date): Builder
    {
        return $query->whereDate('updated_at', '<=', $date);
    }
}
