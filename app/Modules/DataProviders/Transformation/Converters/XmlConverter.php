<?php

namespace App\Modules\DataProviders\Transformation\Converters;

use Spatie\ArrayToXml\ArrayToXml;

class XmlConverter implements Converter
{
    /** @inheritDoc */
    public function convert(array $data): mixed
    {
        return ArrayToXml::convert(['__numeric' => $data], 'users');
    }
}
