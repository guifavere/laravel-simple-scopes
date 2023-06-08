<?php

namespace GuiFavere\LaravelSimpleScopes\Tests\Dates;

use GuiFavere\LaravelSimpleScopes\Dates\DateBuilder;
use GuiFavere\LaravelSimpleScopes\Tests\Models\Resource;
use GuiFavere\LaravelSimpleScopes\Tests\TestCase;
use Illuminate\Database\Eloquent\Builder;
use Mockery\MockInterface;

/**
 * @runTestsInSeparateProcesses
 */
class DateBuilderTest extends TestCase
{
    /** @var MockInterface */
    private $dateRules;

    /** @var DateBuilder */
    private $dateBuilder;

    public function setUp(): void
    {
        parent::setUp();

        $this->dateRules = $this->partialMock(
            'overload:GuiFavere\LaravelSimpleScopes\Dates\DateRules',
            fn (MockInterface $mock) => $mock->shouldReceive('new')->andReturnSelf(),
        );

        $this->dateBuilder = new class (Resource::query()->getQuery()) extends Builder {
            use DateBuilder;
        };
    }

    /** @test */
    public function should_retrieve_all_records_from_a_given_date(): void
    {
        $this->dateRules->shouldReceive('from')->andReturn($this->mock(Builder::class));

        $this->dateBuilder->from('2023-05-10');

        $this->dateRules->shouldHaveReceived('new')->once()->with($this->dateBuilder);
        $this->dateRules->shouldHaveReceived('from')->once()->with('2023-05-10');
    }

    /** @test */
    public function should_retrieve_all_records_to_a_given_date(): void
    {
        $this->dateRules->shouldReceive('to')->andReturn($this->mock(Builder::class));

        $this->dateBuilder->to('2023-01-07');

        $this->dateRules->shouldHaveReceived('new')->once()->with($this->dateBuilder);
        $this->dateRules->shouldHaveReceived('to')->once()->with('2023-01-07');
    }

    /** @test */
    public function should_retrieve_all_records_modified_from_a_given_date(): void
    {
        $this->dateRules->shouldReceive('modifiedFrom')->andReturn($this->mock(Builder::class));

        $this->dateBuilder->modifiedFrom('2023-12-26');

        $this->dateRules->shouldHaveReceived('new')->once()->with($this->dateBuilder);
        $this->dateRules->shouldHaveReceived('modifiedFrom')->once()->with('2023-12-26');
    }

    /** @test */
    public function should_retrieve_all_records_modified_to_a_given_date(): void
    {
        $this->dateRules->shouldReceive('modifiedTo')->andReturn($this->mock(Builder::class));

        $this->dateBuilder->modifiedTo('2023-11-30');

        $this->dateRules->shouldHaveReceived('new')->once()->with($this->dateBuilder);
        $this->dateRules->shouldHaveReceived('modifiedTo')->once()->with('2023-11-30');
    }
}
