<?php

namespace App\Tests\Service;

use App\Service\HomeownerParser;
use PHPUnit\Framework\TestCase;

class HomeOwnersTest extends TestCase
{
    private HomeownerParser $parser;

    protected function setUp(): void
    {
        $this->parser = new HomeownerParser();
    }

    public function testSingleNameFormatWithFullName()
    {
        $filename = '/Users/danish/Downloads/homeowners.csv';
        $parsedData = $this->parser->parseCsv($filename);

        $expected = [
            [
                'title' => 'Mr',
                'first_name' => 'John',
                'initial' => null,
                'last_name' => 'Smith'
            ]
        ];

        $this->assertContains($expected[0], $parsedData);
    }

    public function testEmptyFile()
    {
        $filename = '/Users/danish/Desktop/hello/Untitled.csv.rtf';
        $parsedData = $this->parser->parseCsv($filename);

        $this->assertEmpty($parsedData);
    }
}
