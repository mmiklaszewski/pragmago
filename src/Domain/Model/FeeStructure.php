<?php

namespace App\Domain\Model;

use App\Domain\Exception\CanNotAddTheSameAmountException;

final class FeeStructure
{
    /** @var FeeStructureElement[] */
    private array $elements;

    public function __construct(private int $term, iterable $elements)
    {
        $this->elements = [];
        foreach ($elements as $element) {
            $this->addElement($element);
        }

        $this->sortElements();
    }

    public function term(): int
    {
        return $this->term;
    }

    public function elements(): array
    {
        return $this->elements;
    }

    private function addElement(FeeStructureElement $element): void
    {
        foreach ($this->elements as $currentElements) {
            if ($currentElements->amount->isEqualTo($element->amount)) {
                throw CanNotAddTheSameAmountException::create($element->amount);
            }
        }
        $this->elements[] = $element;
    }

    private function sortElements(): void
    {
        usort(
            $this->elements,
            fn (FeeStructureElement $a, FeeStructureElement $b): int => $a->amount <=> $b->amount,
        );
    }
}
