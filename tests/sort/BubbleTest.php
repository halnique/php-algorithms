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
            'pattern 1' => [
                'actual' => [4, 1, 3, 2],
                'expected' => [1, 2, 3, 4],
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
