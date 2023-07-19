<?php

namespace GuiFavere\LaravelSimpleScopes\Dates;

use Illuminate\Database\Eloquent\Builder;

trait DateQueries
{
    use SetUpDateRules;

    public function createdFrom(string $date): Builder
    {
        return $this->dateRules($this)->createdFrom($date);
    }

    public function createdTo(string $date): Builder
    {
        return $this->dateRules($this)->createdTo($date);
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
