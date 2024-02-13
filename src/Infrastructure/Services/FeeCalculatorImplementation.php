<?php

namespace App\Infrastructure\Services;

use App\Domain\Calculator\FeeCalculator;
use App\Domain\Calculator\Interpolator;
use App\Domain\Model\LoanProposal;
use App\Domain\Repository\FeeStructureRepository;

final readonly class FeeCalculatorImplementation implements FeeCalculator
{
    public function __construct(
        private FeeStructureRepository $feeStructureRepository,
        private Interpolator $interpolator
    ) {
    }

    #[\Override]
    public function calculate(LoanProposal $application): float
    {
        $elements = $this->feeStructureRepository->getStructureForTerm($application->term());

        return $this->interpolator->interpolate($application, $elements)->getAmount()->toFloat();
    }
}
