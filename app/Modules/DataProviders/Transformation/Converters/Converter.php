<?php

namespace App\Modules\DataProviders\Transformation\Converters;

interface Converter
{
    /**
     * Convert data array into new representation
     * @param array $data
     * @return mixed
     */
    public function convert(array $data): mixed;
}
