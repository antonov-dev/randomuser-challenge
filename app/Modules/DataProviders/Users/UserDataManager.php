<?php

namespace App\Modules\DataProviders\Users;

use App\Modules\DataProviders\Transformation\Converters\Converter;
use App\Modules\DataProviders\Transformation\Sorters\Sorter;
use App\Modules\DataProviders\Users\Providers\UserDataProvider;

class UserDataManager
{
    /**
     * Data container
     * @var array
     */
    protected array $data = [];

    /**
     * @var UserDataProvider
     */
    protected UserDataProvider $provider;

    /**
     * @var Sorter
     */
    protected Sorter $sorter;

    /**
     * @var Converter
     */
    protected Converter $converter;

    /**
     * UserDataManager construct
     * @param UserDataProvider $provider
     * @param Sorter $sorter
     * @param Converter $converter
     */
    public function __construct(UserDataProvider $provider, Sorter $sorter, Converter $converter)
    {
        $this->provider = $provider;
        $this->sorter = $sorter;
        $this->converter = $converter;
    }

    /**
     * Retrieve data from provider
     * @param $count
     * @return UserDataManager
     */
    public function retrieve($count): static
    {
        $this->data = $this->provider->get($count);

        return $this;
    }

    /**
     * Sort retrieved data
     * @param string $field
     * @param string $order
     * @return UserDataManager
     */
    public function sort(string $field, string $order): static
    {
        $this->data = $this->sorter->sort($this->data, $field, $order);

        return $this;
    }

    /**
     * Convert data into new representation
     * @return mixed
     */
    public function convert(): mixed
    {
        return $this->converter->convert($this->data);
    }
}
