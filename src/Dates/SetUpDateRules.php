<?php

namespace GuiFavere\LaravelSimpleScopes\Dates;

use Illuminate\Database\Eloquent\Builder;

trait SetUpDateRules
{
    /** @var DateRules */
    private $dateRules;

    private function wasNotDefinedDateRules(): bool
    {
        return is_null($this->dateRules);
    }

    private function defineDateRules(Builder $query): void
    {
        $this->dateRules = DateRules::new($query);
    }

    private function defineDateRulesIfNotDefined(Builder $query): void
    {
        if ($this->wasNotDefinedDateRules()) {
            $this->defineDateRules($query);
        }
    }

    public function dateRules(Builder $query): DateRules
    {
        $this->defineDateRulesIfNotDefined($query);

        return $this->dateRules;
    }
}
