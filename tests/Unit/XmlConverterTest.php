<?php

namespace Tests\Unit;

use App\Modules\DataProviders\Transformation\Converters\XmlConverter;
use Tests\TestCase;

class XmlConverterTest extends TestCase
{
    /**
     * @test
     */
    public function converter_generate_valid_xml(): void
    {
        $data = [
            [
                'name' => 'Mrs Lyna Simon',
                'email' => 'lyna.simon@example.com'
            ],
            [
                'name' => 'Mr Rayan Abdullahi',
                'email' => 'rayan.abdullahi@example.com'
            ]
        ];
        $result = (new XmlConverter())->convert($data);

        $this->assertNotEmpty($result);

        $result = simplexml_load_string($result, "SimpleXMLElement", LIBXML_NOCDATA);

        $this->assertCount(2, $result);
        $this->assertEquals($result->numeric_0->name, $data[0]['name']);
        $this->assertEquals($result->numeric_0->email, $data[0]['email']);
        $this->assertEquals($result->numeric_1->name, $data[1]['name']);
        $this->assertEquals($result->numeric_1->email, $data[1]['email']);

        $this->assertEmpty($result->numeric_2);
    }

    /**
     * @test
     */
    public function converter_dont_fail_with_empty_data(): void
    {
        $this->expectNotToPerformAssertions();
        (new XmlConverter())->convert([]);
    }
}
