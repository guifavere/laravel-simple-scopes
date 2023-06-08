<?php

namespace GuiFavere\LaravelSimpleScopes\Tests;

use GuiFavere\LaravelSimpleScopes\Tests\Models\Resource;

function fakeRecords(): array
{
    return [
        ['created_at' => '2023-05-09 09:20:05', 'updated_at' => '2023-05-09 09:20:05'],
        ['created_at' => '2023-05-10 08:20:05', 'updated_at' => '2023-05-10 08:20:05'],
        ['created_at' => '2023-05-10 09:20:05', 'updated_at' => '2023-05-10 09:20:05'],
        ['created_at' => '2023-05-10 12:00:01', 'updated_at' => '2023-05-11 08:00:00'],
        ['created_at' => '2023-05-11 15:40:00', 'updated_at' => '2023-05-11 17:59:13'],
    ];
}

class SimpleScopesTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        now()->setTestNow('2023-05-10 09:20:05');

        collect(fakeRecords())->each(fn (array $record) => factory(Resource::class)->create($record));
    }

    /** @test */
    public function should_retrieve_all_records_from_a_given_date(): void
    {
        $this->assertEquals(4, Resource::from('2023-05-10')->count());
    }

    /** @test */
    public function should_retrieve_all_records_to_a_given_date(): void
    {
        $this->assertEquals(1, Resource::to('2023-05-09')->count());
    }

    /** @test */
    public function should_retrieve_all_records_modified_from_a_given_date(): void
    {
        $this->assertEquals(2, Resource::modifiedFrom('2023-05-11')->count());
    }

    /** @test */
    public function should_retrieve_all_records_modified_to_a_given_date(): void
    {
        $this->assertEquals(3, Resource::modifiedTo('2023-05-10')->count());
    }
}
