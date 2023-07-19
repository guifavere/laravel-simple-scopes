<?php

namespace GuiFavere\LaravelSimpleScopes\Dates;

use Illuminate\Database\Eloquent\Builder;

/**
 * @method static Builder createdFrom(string $date)
 * @method static Builder createdTo(string $date)
 * @method static Builder modifiedFrom(string $date)
 * @method static Builder modifiedTo(string $date)
 */
trait DateScopes
{
    use SetUpDateRules;

    public function scopeCreatedFrom(Builder $query, string $date): Builder
    {
        return $this->dateRules($query)->createdFrom($date);
    }

    public function scopeCreatedTo(Builder $query, string $date): Builder
    {
        return $this->dateRules($query)->createdTo($date);
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
