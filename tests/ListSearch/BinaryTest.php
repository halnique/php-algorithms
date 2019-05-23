<?php

namespace HalniqueTest\Algorithms\ListSearch;

use Halnique\Algorithms\ListSearch\Binary;
use HalniqueTest\Algorithms\TestCase;

class BinaryTest extends TestCase
{
    /** @var Binary */
    private $binary;

    protected function setUp(): void
    {
        parent::setUp();

        $this->binary = new Binary();
    }

    public function searchDataProvider(): array
    {
        return [
            'pattern int 1-1' => [
                'actual' => [1, 2, 3, 4],
                'target' => 2,
                'expected' => true,
            ],
            'pattern int 1-2' => [
                'actual' => [4, 1, 3, 2],
                'target' => 5,
                'expected' => false,
            ],
            'pattern int 2-1' => [
                'actual' => [2, 3, 5, 7, 11, 13, 17],
                'target' => 13,
                'expected' => true,
            ],
            'pattern int 2-2' => [
                'actual' => [2, 3, 5, 7, 11, 13, 17],
                'target' => 10,
                'expected' => false,
            ],
            'pattern float 1-1' => [
                'actual' => [0.3, 1.0, 1.1, 2.4, 2.7],
                'target' => 2.7,
                'expected' => true,
            ],
            'pattern float 1-2' => [
                'actual' => [0.3, 1.0, 1.1, 2.4, 2.7],
                'target' => 1.5,
                'expected' => false,
            ],
            'pattern string 1-1' => [
                'actual' => ['channel', 'drink', 'monster', 'phone', 'speaker', 'towel'],
                'target' => 'speaker',
                'expected' => true,
            ],
            'pattern string 1-2' => [
                'actual' => ['channel', 'drink', 'monster', 'phone', 'speaker', 'towel'],
                'target' => 'book',
                'expected' => false,
            ],
        ];
    }

    /**
     * @dataProvider searchDataProvider
     * @param array $actual
     * @param $target
     * @param bool $expected
     */
    public function testSearch(array $actual, $target, bool $expected)
    {
        $this->assertEquals($expected, $this->binary->search($actual, $target));
    }
}
