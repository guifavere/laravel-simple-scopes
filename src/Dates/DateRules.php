<?php

namespace GuiFavere\LaravelSimpleScopes\Dates;

use Illuminate\Database\Eloquent\Builder;

class DateRules implements Rules
{
    /** @var Builder */
    private $builder;

    private function __construct(Builder $builder)
    {
        $this->builder = $builder;
    }

    public static function new(Builder $builder): self
    {
        return new self($builder);
    }

    public function createdFrom(string $date): Builder
    {
        return $this->builder->where('created_at', '>=', $date);
    }

    public function createdTo(string $date): Builder
    {
        return $this->builder->whereDate('created_at', '<=', $date);
    }

    public function modifiedFrom(string $date): Builder
    {
        return $this->builder->whereDate('updated_at', '>=', $date);
    }

    public function modifiedTo(string $date): Builder
    {
        return $this->builder->whereDate('updated_at', '<=', $date);
    }
}
