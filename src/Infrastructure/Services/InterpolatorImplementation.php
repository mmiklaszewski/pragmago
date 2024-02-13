<?php

namespace App\Infrastructure\Services;

use App\Domain\Calculator\Interpolator;
use App\Domain\Exception\IncorrectAmountException;
use App\Domain\Model\FeeStructure;
use App\Domain\Model\LoanProposal;
use Brick\Money\Money;

final class InterpolatorImplementation implements Interpolator
{
    public function interpolate(LoanProposal $proposal, FeeStructure $structure): Money
    {
        $beforeOrEqual = null;
        $after = null;
        foreach ($structure->elements() as $element) {
            if ($element->amount->isEqualTo($proposal->amount())) {
                return $element->fee;
            }
            if ($element->amount->isLessThanOrEqualTo($proposal->amount())) {
                $beforeOrEqual = $element;
            } else {
                $after = $element;
                break;
            }
        }

        if (null === $beforeOrEqual) {
            throw IncorrectAmountException::create($proposal->amount());
        }

        if (null === $after) {
            return $beforeOrEqual->fee;
        }

        if ($after->fee->isEqualTo($beforeOrEqual->fee)) {
            return $beforeOrEqual->fee;
        }

        if ($after->fee->isLessThan($beforeOrEqual->fee)) {
            $feeDiff = $beforeOrEqual->fee->minus($after->fee);
        } else {
            $feeDiff = $after->fee->minus($beforeOrEqual->fee);
        }

        $amountDiff = $after->amount->minus($beforeOrEqual->amount);

        $amountDiff->getAmount()->toBigRational()->dividedBy(3);

        $feePer5 = $amountDiff->getAmount()->toBigRational()->dividedBy(ceil($feeDiff->getAmount()->dividedBy(5)->toFloat()));
        $amountToAdditionalFee = $proposal->amount() - $beforeOrEqual->amount->getAmount()->toFloat();
        $additionalFee = ceil($amountToAdditionalFee / $feePer5->toFloat()) * 5;

        if ($after->fee->isLessThan($beforeOrEqual->fee)) {
            $fee = $beforeOrEqual->fee->minus($additionalFee);
        } else {
            $fee = $beforeOrEqual->fee->plus($additionalFee);
        }

        return $fee;
    }
}
