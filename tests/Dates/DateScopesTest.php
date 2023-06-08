<?php

namespace GuiFavere\LaravelSimpleScopes\Tests\Dates;

use GuiFavere\LaravelSimpleScopes\Dates\DateScopes;
use GuiFavere\LaravelSimpleScopes\Tests\TestCase;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Mockery\MockInterface;

/**
 * @runTestsInSeparateProcesses
 */
class DateScopesTest extends TestCase
{
    /** @var MockInterface */
    private $dateRules;

    /** @var DateScopes */
    private $dateScopes;

    public function setUp(): void
    {
        parent::setUp();

        $this->dateRules = $this->partialMock(
            'overload:GuiFavere\LaravelSimpleScopes\Dates\DateRules',
            fn (MockInterface $mock) => $mock->shouldReceive('new')->andReturnSelf(),
        );

        $this->dateScopes = new class () extends Model {
            use DateScopes;
        };
    }

    /** @test */
    public function should_retrieve_all_records_from_a_given_date(): void
    {
        $this->dateRules->shouldReceive('from')->andReturn($this->mock(Builder::class));

        $this->dateScopes->from('2023-05-10');

        $this->dateRules->shouldHaveReceived('new')->once()->withArgs(
            fn (Builder $arg) => $arg->toSql() === $this->dateScopes->toSql(),
        );

        $this->dateRules->shouldHaveReceived('from')->once()->with('2023-05-10');
    }

    /** @test */
    public function should_retrieve_all_records_to_a_given_date(): void
    {
        $this->dateRules->shouldReceive('to')->andReturn($this->mock(Builder::class));

        $this->dateScopes->to('2023-01-07');

        $this->dateRules->shouldHaveReceived('new')->once()->withArgs(
            fn (Builder $arg) => $arg->toSql() === $this->dateScopes->toSql(),
        );

        $this->dateRules->shouldHaveReceived('to')->once()->with('2023-01-07');
    }

    /** @test */
    public function should_retrieve_all_records_modified_from_a_given_date(): void
    {
        $this->dateRules->shouldReceive('modifiedFrom')->andReturn($this->mock(Builder::class));

        $this->dateScopes->modifiedFrom('2023-12-26');

        $this->dateRules->shouldHaveReceived('new')->once()->withArgs(
            fn (Builder $arg) => $arg->toSql() === $this->dateScopes->toSql(),
        );

        $this->dateRules->shouldHaveReceived('modifiedFrom')->once()->with('2023-12-26');
    }

    /** @test */
    public function should_retrieve_all_records_modified_to_a_given_date(): void
    {
        $this->dateRules->shouldReceive('modifiedTo')->andReturn($this->mock(Builder::class));

        $this->dateScopes->modifiedTo('2023-11-30');

        $this->dateRules->shouldHaveReceived('new')->once()->withArgs(
            fn (Builder $arg) => $arg->toSql() === $this->dateScopes->toSql(),
        );

        $this->dateRules->shouldHaveReceived('modifiedTo')->once()->with('2023-11-30');
    }
}
