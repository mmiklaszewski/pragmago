<?php

namespace App\Tests;

use App\Domain\Calculator\FeeCalculator;
use App\Domain\Model\LoanProposal;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class FeeCalculatorTest extends KernelTestCase
{
    /**
     * @dataProvider data
     */
    public function testFee(int $term, float $amount, float $fee)
    {
        self::bootKernel();
        $container = self::getContainer();
        $calculator = $container->get(FeeCalculator::class);

        $result = $calculator->calculate(new LoanProposal($term, $amount));

        $this->assertEquals($fee, $result);
    }

    public static function data(): array
    {
        return [
            [
                12, 1000, 50,
            ],
            [
                24, 2750, 115,
            ],
            [
                24, 11500, 460,
            ],
            [
                12, 19250, 385,
            ],
            [
                12, 13300, 270,
            ],
            [
                12, 20000, 400,
            ],
            [
                12, 2300, 90,
            ],
            [
                12, 3300, 100,
            ],
        ];
    }
}
