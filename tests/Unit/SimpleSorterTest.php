<?php

namespace Tests\Unit;

use App\Modules\DataProviders\Transformation\Sorters\SimpleSorter;
use App\Modules\DataProviders\Transformation\Sorters\Sorter;
use Tests\TestCase;

class SimpleSorterTest extends TestCase
{
    /**
     * @var array
     */
    protected array $data;

    /**
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->data = [
            [
                'first_name' => 'Lyna',
                'last_name' => 'Simon'
            ],
            [
                'first_name' => 'Rayan',
                'last_name' => 'Abdullahi'
            ],
            [
                'first_name' => 'Vladimir',
                'last_name' => 'Zivanović'
            ]
        ];
    }

    /**
     * @test
     */
    public function sorter_can_sort_in_asc_order(): void
    {
        $result = (new SimpleSorter())
            ->sort($this->data, 'last_name', Sorter::ORDER_ASC);

        $this->assertCount(3, $result);
        $this->assertCount(2, $result[0]);
        $this->assertEquals($result[0]['last_name'], 'Abdullahi');
        $this->assertEquals($result[2]['last_name'], 'Zivanović');
    }

    /**
     * @test
     */
    public function sorter_can_sort_in_desc_order(): void
    {
        $result = (new SimpleSorter())
            ->sort($this->data, 'last_name', Sorter::ORDER_DESC);

        $this->assertCount(3, $result);
        $this->assertCount(2, $result[0]);
        $this->assertEquals($result[0]['last_name'], 'Zivanović');
        $this->assertEquals($result[2]['last_name'], 'Abdullahi');
    }

    /**
     * @test
     */
    public function sorter_dont_fail_with_empty_data(): void
    {
        $this->expectNotToPerformAssertions();
        (new SimpleSorter())
            ->sort([], 'last_name', Sorter::ORDER_DESC);
    }

    /**
     * @test
     */
    public function sorter_dont_touch_data_when_field_not_exists(): void
    {
        $result = (new SimpleSorter())
            ->sort($this->data, 'phone', Sorter::ORDER_DESC);

        $this->assertCount(3, $result);
        $this->assertCount(2, $result[0]);
        $this->assertEquals($result[0]['last_name'], 'Simon');
        $this->assertEquals($result[2]['last_name'], 'Zivanović');
    }
}
