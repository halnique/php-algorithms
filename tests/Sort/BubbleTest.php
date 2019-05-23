<?php

namespace HalniqueTest\Algorithms\Sort;

use Halnique\Algorithms\Sort\Bubble;
use HalniqueTest\Algorithms\TestCase;


class BubbleTest extends TestCase
{
    /** @var Bubble */
    private $bubble;

    protected function setUp(): void
    {
        parent::setUp();

        $this->bubble = new Bubble();
    }

    public function sortDataProvider(): array
    {
        return [
            'pattern int 1' => [
                'actual' => [4, 1, 3, 2],
                'expected' => [1, 2, 3, 4],
            ],
            'pattern int 2' => [
                'actual' => [7, 17, 5, 3, 13, 2, 11],
                'expected' => [2, 3, 5, 7, 11, 13, 17],
            ],
            'pattern float 1' => [
                'actual' => [2.4, 2.7, 0.3, 1.1, 1.0],
                'expected' => [0.3, 1.0, 1.1, 2.4, 2.7],
            ],
            'pattern string 1' => [
                'actual' => ['monster', 'drink', 'channel', 'speaker', 'towel', 'phone'],
                'expected' => ['channel', 'drink', 'monster', 'phone', 'speaker', 'towel'],
            ],
        ];
    }

    /**
     * @dataProvider sortDataProvider
     * @param array $actual
     * @param array $expected
     */
    public function testSort(array $actual, array $expected)
    {
        $this->assertEquals($expected, $this->bubble->sort($actual));
    }
}
