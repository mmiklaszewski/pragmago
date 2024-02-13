<?php

namespace App\UI\Controller;

use App\Application\Query\CalculateFee\CalculateFeeQuery;
use App\Application\Query\CalculateFee\LoanFee;
use App\Application\Query\QueryBus;
use App\Domain\Model\LoanProposal;
use App\UI\Input\CalculateInput;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;

final class CalculatorController extends AbstractController
{
    #[Route('/')]
    public function indexNoLocale(): Response
    {
        return $this->redirectToRoute('homepage', ['_locale' => 'pl']);
    }

    #[Route('/{_locale<%app.supported_locales%>}/', name: 'homepage')]
    public function index(): Response
    {
        return $this->render('calculator.html.twig');
    }

    #[Route('/{_locale<%app.supported_locales%>}/calculate', name: 'calculate', methods: ['POST'])]
    public function calculate(
        #[MapRequestPayload] CalculateInput $input,
        QueryBus $queryBus
    ): Response {
        /** @var LoanFee $result */
        $result = $queryBus->handle(
            new CalculateFeeQuery(
                new LoanProposal(
                    $input->term,
                    $input->amount
                )
            )
        );

        return $this->render('result.html.twig', $result->jsonSerialize());
    }
}
