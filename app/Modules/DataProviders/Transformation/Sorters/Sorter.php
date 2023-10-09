<?php

namespace App\Modules\DataProviders\Transformation\Sorters;

interface Sorter
{
    const ORDER_ASC = 'asc';
    const ORDER_DESC = 'desc';

    /**
     * Sort data array according to specified conditions
     * @param array $data
     * @param string $field
     * @param string $order
     * @return mixed
     */
    public function sort(array $data, string $field, string $order): array;
}
