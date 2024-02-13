<?php

namespace App\UI\Input;

use Symfony\Component\Validator\Constraints as Assert;

final class CalculateInput
{
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Choice([12, 24])]
        public int $term,

        #[Assert\NotBlank]
        #[Assert\Range(
            notInRangeMessage: 'Type value between {{ min }} and {{ max }}',
            min: 1000,
            max: 20000,
        )]
        public float $amount,
    ) {
    }
}
