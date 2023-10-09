<?php

namespace App\Modules\DataProviders\Transformation\Sorters;

class SimpleSorter implements Sorter
{
    /** @inheritDoc */
    public function sort(array $data, string $field, string $order = 'asc'): array
    {
        return $order == self::ORDER_ASC
            ? collect($data)->sortBy($field)->values()->all()
            : collect($data)->sortByDesc($field)->values()->all();
    }
}
