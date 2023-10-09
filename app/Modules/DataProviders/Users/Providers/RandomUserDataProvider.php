<?php

namespace App\Modules\DataProviders\Users\Providers;

use App\Modules\DataProviders\Users\DataProviderUser;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class RandomUserDataProvider implements UserDataProvider
{
    /**
     * Service URL
     * @var string
     */
    protected string $url;

    /**
     * RandomUserDataProvider construct
     */
    protected function __construct()
    {
        $this->url = config('services.user_data_providers.randomuser.url');
    }

    /** @inheritDoc */
    public function get(int $count = 10): array
    {
        $results = [];

        // Retrieve data from service
        for ($i = 0; $i < $count; $i++) {
            $response = Http::get($this->url);
            if($response->ok() && $result = Arr::get($response, 'results.0')) {

                // Mapping user
                $user = new DataProviderUser();
                $user->setTitle(Arr::get($result, 'name.title'));
                $user->setLastName(Arr::get($result, 'name.last'));
                $user->setFirstName(Arr::get($result, 'name.first'));
                $user->setCountry(Arr::get($result, 'location.country'));
                $user->setEmail(Arr::get($result, 'email'));
                $user->setPhone(Arr::get($result, 'phone'));

                $results[] = $user;
            }
        }

        return $results;
    }
}
