<?php

namespace App\Infrastructure\Repository;

use App\Domain\Exception\IncorrectTermException;
use App\Domain\Model\FeeStructure;
use App\Domain\Model\FeeStructureElement;
use App\Domain\Repository\FeeStructureRepository;
use Brick\Money\Money;

final class FeeStructureRepositoryImplementation implements FeeStructureRepository
{
    public function getStructureForTerm(int $term): FeeStructure
    {
        $structures = [];
        $structures[12] =
            new FeeStructure(12, [
                new FeeStructureElement(Money::of(1000, 'PLN'), Money::of(50, 'PLN')),
                new FeeStructureElement(Money::of(3000, 'PLN'), Money::of(90, 'PLN')),
                new FeeStructureElement(Money::of(2000, 'PLN'), Money::of(90, 'PLN')),
                new FeeStructureElement(Money::of(4000, 'PLN'), Money::of(115, 'PLN')),
                new FeeStructureElement(Money::of(5000, 'PLN'), Money::of(100, 'PLN')),
                new FeeStructureElement(Money::of(6000, 'PLN'), Money::of(120, 'PLN')),
                new FeeStructureElement(Money::of(7000, 'PLN'), Money::of(140, 'PLN')),
                new FeeStructureElement(Money::of(8000, 'PLN'), Money::of(160, 'PLN')),
                new FeeStructureElement(Money::of(9000, 'PLN'), Money::of(180, 'PLN')),
                new FeeStructureElement(Money::of(10000, 'PLN'), Money::of(200, 'PLN')),
                new FeeStructureElement(Money::of(11000, 'PLN'), Money::of(220, 'PLN')),
                new FeeStructureElement(Money::of(12000, 'PLN'), Money::of(240, 'PLN')),
                new FeeStructureElement(Money::of(14000, 'PLN'), Money::of(280, 'PLN')),
                new FeeStructureElement(Money::of(13000, 'PLN'), Money::of(260, 'PLN')),
                new FeeStructureElement(Money::of(15000, 'PLN'), Money::of(300, 'PLN')),
                new FeeStructureElement(Money::of(16000, 'PLN'), Money::of(320, 'PLN')),
                new FeeStructureElement(Money::of(17000, 'PLN'), Money::of(340, 'PLN')),
                new FeeStructureElement(Money::of(18000, 'PLN'), Money::of(360, 'PLN')),
                new FeeStructureElement(Money::of(19000, 'PLN'), Money::of(380, 'PLN')),
                new FeeStructureElement(Money::of(20000, 'PLN'), Money::of(400, 'PLN')),
            ]);

        $structures[24] =
            new FeeStructure(24, [
                new FeeStructureElement(Money::of(1000, 'PLN'), Money::of(70, 'PLN')),
                new FeeStructureElement(Money::of(2000, 'PLN'), Money::of(100, 'PLN')),
                new FeeStructureElement(Money::of(3000, 'PLN'), Money::of(120, 'PLN')),
                new FeeStructureElement(Money::of(4000, 'PLN'), Money::of(160, 'PLN')),
                new FeeStructureElement(Money::of(5000, 'PLN'), Money::of(200, 'PLN')),
                new FeeStructureElement(Money::of(6000, 'PLN'), Money::of(240, 'PLN')),
                new FeeStructureElement(Money::of(7000, 'PLN'), Money::of(280, 'PLN')),
                new FeeStructureElement(Money::of(8000, 'PLN'), Money::of(320, 'PLN')),
                new FeeStructureElement(Money::of(9000, 'PLN'), Money::of(360, 'PLN')),
                new FeeStructureElement(Money::of(10000, 'PLN'), Money::of(400, 'PLN')),
                new FeeStructureElement(Money::of(11000, 'PLN'), Money::of(440, 'PLN')),
                new FeeStructureElement(Money::of(12000, 'PLN'), Money::of(480, 'PLN')),
                new FeeStructureElement(Money::of(13000, 'PLN'), Money::of(520, 'PLN')),
                new FeeStructureElement(Money::of(14000, 'PLN'), Money::of(560, 'PLN')),
                new FeeStructureElement(Money::of(15000, 'PLN'), Money::of(600, 'PLN')),
                new FeeStructureElement(Money::of(16000, 'PLN'), Money::of(640, 'PLN')),
                new FeeStructureElement(Money::of(17000, 'PLN'), Money::of(680, 'PLN')),
                new FeeStructureElement(Money::of(18000, 'PLN'), Money::of(720, 'PLN')),
                new FeeStructureElement(Money::of(19000, 'PLN'), Money::of(760, 'PLN')),
                new FeeStructureElement(Money::of(20000, 'PLN'), Money::of(800, 'PLN')),
                ]);

        return $structures[$term] ?? throw IncorrectTermException::create($term);
    }
}
