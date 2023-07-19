<?php

namespace GuiFavere\LaravelSimpleScopes\Dates;

use Illuminate\Database\Eloquent\Builder;

interface Rules
{
    public function createdFrom(string $date): Builder;

    public function createdTo(string $date): Builder;

    public function modifiedFrom(string $date): Builder;

    public function modifiedTo(string $date): Builder;
}
