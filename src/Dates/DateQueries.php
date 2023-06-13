<?php

namespace GuiFavere\LaravelSimpleScopes\Dates;

use Illuminate\Database\Eloquent\Builder;

trait DateQueries
{
    use SetUpDateRules;

    public function from(string $date): Builder
    {
        return $this->dateRules($this)->from($date);
    }

    public function to(string $date): Builder
    {
        return $this->dateRules($this)->to($date);
    }

    public function modifiedFrom(string $date): Builder
    {
        return $this->dateRules($this)->modifiedFrom($date);
    }

    public function modifiedTo(string $date): Builder
    {
        return $this->dateRules($this)->modifiedTo($date);
    }
}
