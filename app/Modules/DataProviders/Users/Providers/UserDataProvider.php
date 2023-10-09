<?php

namespace App\Modules\DataProviders\Users\Providers;

interface UserDataProvider
{
    /**
     * Get user data from service
     * @param int $count
     * @return array
     */
    public function get(int $count = 10): array;
}
