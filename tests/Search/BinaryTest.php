<?php

namespace HalniqueTest\Algorithms\Search;

use Halnique\Algorithms\Search\Binary;
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
                'actual' => [4, 1, 3, 2],
                'target' => 2,
                'expected' => 3,
            ],
            'pattern int 1-2' => [
                'actual' => [4, 1, 3, 2],
                'target' => 5,
                'expected' => null,
            ],
            'pattern int 2-1' => [
                'actual' => [7, 17, 5, 3, 13, 2, 11],
                'target' => 13,
                'expected' => 4,
            ],
            'pattern int 2-2' => [
                'actual' => [7, 17, 5, 3, 13, 2, 11],
                'target' => 10,
                'expected' => null,
            ],
            'pattern float 1-1' => [
                'actual' => [2.4, 2.7, 0.3, 1.1, 1.0],
                'target' => 2.7,
                'expected' => 1,
            ],
            'pattern float 1-2' => [
                'actual' => [2.4, 2.7, 0.3, 1.1, 1.0],
                'target' => 1.5,
                'expected' => null,
            ],
            'pattern string 1-1' => [
                'actual' => ['monster', 'drink', 'channel', 'speaker', 'towel', 'phone'],
                'target' => 'speaker',
                'expected' => 3,
            ],
            'pattern string 1-2' => [
                'actual' => ['monster', 'drink', 'channel', 'speaker', 'towel', 'phone'],
                'target' => 'book',
                'expected' => null,
            ],
        ];
    }

    /**
     * @dataProvider searchDataProvider
     * @param array $actual
     * @param $target
     * @param int|null $expected
     */
    public function testSearch(array $actual, $target, ?int $expected)
    {
        $this->assertEquals($expected, $this->binary->search($actual, $target));
    }
}
