<?php

namespace Tests\Unit;

use App\Modules\DataProviders\Transformation\Converters\Converter;
use App\Modules\DataProviders\Transformation\Sorters\Sorter;
use App\Modules\DataProviders\Users\Providers\UserDataProvider;
use App\Modules\DataProviders\Users\UserDataManager;
use Mockery\MockInterface;
use Tests\TestCase;

class UserDataManagerTest extends TestCase
{
    /**
     * @test
     */
    public function user_data_manager_can_retrieve_data(): void
    {
        $this->mock(UserDataProvider::class, function (MockInterface $mock) {
            $mock->shouldReceive('get')
                ->with(10)
                ->once();
        });

        /** @var UserDataManager $manager */
        $manager = resolve(UserDataManager::class);
        $manager->retrieve(10);
    }

    /**
     * @test
     */
    public function user_data_manager_can_sort_data_in_asc_order(): void
    {
        $this->mock(UserDataProvider::class, function (MockInterface $mock) {
            $mock->shouldReceive('get')
                ->andReturn([['full_name' => 'Full Name']]);
        });
        $this->mock(Sorter::class, function (MockInterface $mock) {
            $mock->shouldReceive('sort')
                ->with([['full_name' => 'Full Name']], 'full_name', Sorter::ORDER_ASC)
                ->once();
        });

        /** @var UserDataManager $manager */
        $manager = resolve(UserDataManager::class);
        $manager->retrieve(10)->sort('full_name', Sorter::ORDER_ASC);
    }

    /**
     * @test
     */
    public function user_data_manager_can_sort_data_in_desc_order(): void
    {
        $this->mock(UserDataProvider::class, function (MockInterface $mock) {
            $mock->shouldReceive('get')
                ->andReturn([['full_name' => 'Full Name']]);
        });
        $this->mock(Sorter::class, function (MockInterface $mock) {
            $mock->shouldReceive('sort')
                ->with([['full_name' => 'Full Name']], 'last_name', Sorter::ORDER_DESC)
                ->once();
        });

        /** @var UserDataManager $manager */
        $manager = resolve(UserDataManager::class);
        $manager->retrieve(10)->sort('last_name', Sorter::ORDER_DESC);
    }

    /**
     * @test
     */
    public function user_data_manager_can_convert_data(): void
    {
        $this->mock(UserDataProvider::class, function (MockInterface $mock) {
            $mock->shouldReceive('get')
                ->andReturn([['full_name' => 'Full Name']]);
        });
        $this->mock(Converter::class, function (MockInterface $mock) {
            $mock->shouldReceive('convert')
                ->with([['full_name' => 'Full Name']])
                ->once();
        });

        /** @var UserDataManager $manager */
        $manager = resolve(UserDataManager::class);
        $manager->retrieve(10)->convert();
    }
}
