<?php

namespace App\Modules\DataProviders\Users\Providers;

interface UserDataProvider
{
    /**
     * Get user data from service
     * @param int $count
     * @param bool $asArray
     * @return array
     */
    public function get(int $count = 10, bool $asArray = true): array;
}
