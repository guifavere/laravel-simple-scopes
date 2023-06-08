<?php

namespace GuiFavere\LaravelSimpleScopes\Dates;

use Illuminate\Database\Eloquent\Builder;

interface Rules
{
    public function from(string $date): Builder;

    public function to(string $date): Builder;

    public function modifiedFrom(string $date): Builder;

    public function modifiedTo(string $date): Builder;
}
