<?php

namespace Tests\Unit;

use App\Modules\DataProviders\Users\DataProviderUser;
use App\Modules\DataProviders\Users\Providers\RandomUserDataProvider;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class RandomUserDataProviderTest extends TestCase
{
    /**
     * @test
     */
    public function provider_throws_error_when_not_configured(): void
    {
        Config::set('services.user_data_providers.randomuser.url', '');
        $this->expectException('Exception');
        new RandomUserDataProvider();
    }

    /**
     * @test
     */
    public function provider_returns_correct_number_of_items(): void
    {
        $result = (new RandomUserDataProvider())->get(1);
        $this->assertCount(1, $result);

        $result = (new RandomUserDataProvider())->get(3);
        $this->assertCount(3, $result);
    }

    /**
     * @test
     */
    public function provider_can_return_user_data_as_array(): void
    {
        $result = (new RandomUserDataProvider())->get(1);
        $this->assertIsArray($result[0]);
    }

    /**
     * @test
     */
    public function provider_can_return_user_data_as_object(): void
    {
        $result = (new RandomUserDataProvider())->get(1, false);
        $this->assertInstanceOf(DataProviderUser::class, $result[0]);
    }

    /**
     * @test
     */
    public function provider_returns_proper_user_fields(): void
    {
        $result = (new RandomUserDataProvider())->get(1);

        $this->assertArrayHasKey('full_name', $result[0]);
        $this->assertArrayHasKey('last_name', $result[0]);
        $this->assertArrayHasKey('phone', $result[0]);
        $this->assertArrayHasKey('email', $result[0]);
        $this->assertArrayHasKey('country', $result[0]);
    }
}
