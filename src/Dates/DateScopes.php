<?php

namespace GuiFavere\LaravelSimpleScopes\Dates;

use Illuminate\Database\Eloquent\Builder;

/**
 * @method static Builder from(string $date)
 * @method static Builder to(string $date)
 * @method static Builder modifiedFrom(string $date)
 * @method static Builder modifiedTo(string $date)
 */
trait DateScopes
{
    use SetUpDateRules;

    public function scopeFrom(Builder $query, string $date): Builder
    {
        return $this->dateRules($query)->from($date);
    }

    public function scopeTo(Builder $query, string $date): Builder
    {
        return $this->dateRules($query)->to($date);
    }

    public function scopeModifiedFrom(Builder $query, string $date): Builder
    {
        return $this->dateRules($query)->modifiedFrom($date);
    }

    public function scopeModifiedTo(Builder $query, string $date): Builder
    {
        return $this->dateRules($query)->modifiedTo($date);
    }
}
