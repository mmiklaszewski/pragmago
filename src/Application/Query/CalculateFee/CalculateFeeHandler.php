<?php

namespace App\Application\Query\CalculateFee;

use App\Domain\Calculator\FeeCalculator;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class CalculateFeeHandler
{
    private FeeCalculator $calculator;

    public function __construct(FeeCalculator $calculator)
    {
        $this->calculator = $calculator;
    }

    public function __invoke(CalculateFeeQuery $query): LoanFee
    {
        $fee = $this->calculator->calculate($query->proposal);

        return new LoanFee(
            $query->proposal->term(),
            $query->proposal->amount(),
            $fee
        );
    }
}
