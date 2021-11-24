<?php

namespace App\Controller;

use App\Entity\Character;
use App\Services\CharacterServiceInterface;
use App\Form\CharacterHtmlType;
use App\Repository\CharacterRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/character/html')]
class CharacterHtmlController extends AbstractController
{
    private $characterService;

    /**
     * CharacterHtmlController constructor.
     * @param $characterService
     */
    public function __construct(CharacterServiceInterface $characterService)
    {
        $this->characterService = $characterService;
    }


    #[Route('/', name: 'character_html_index', methods: ['GET'])]
    public function index(CharacterRepository $characterRepository): Response
    {
        return $this->render('character_html/index.html.twig', [
            'characters' => $characterRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'character_html_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('characterCreate', null);

        $character = new Character();
        $form = $this->createForm(CharacterHtmlType::class, $character);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->characterService->createFormHtml($character);

            return $this->redirectToRoute('character_html_show', array('id' => $character->getId()));
        }

        return $this->render('character_html/new.html.twig', [
            'character' => $character,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'character_html_show', methods: ['GET'])]
    public function show(Character $character): Response
    {
        return $this->render('character_html/show.html.twig', [
            'character' => $character,
        ]);
    }

    #[Route('/{id}/edit', name: 'character_html_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Character $character, EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('characterModify', $character);
        $form = $this->createForm(CharacterHtmlType::class, $character);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->characterService->modifyFormHtml($character);

            return $this->redirectToRoute('character_html_show', array( 'id' => $character->getId()));
        }

        return $this->renderForm('character_html/edit.html.twig', [
            'character' => $character,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'character_html_delete', methods: ['POST'])]
    public function delete(Request $request, Character $character, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$character->getId(), $request->request->get('_token'))) {
            $entityManager->remove($character);
            $entityManager->flush();
        }

        return $this->redirectToRoute('character_html_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/intelligence/{level}', name: 'character_html_all_by_intelligence_level', methods: ['GET', 'POST'])]
    public function showAllByIntelligenceLevel(CharacterRepository $characterRepository, int $level): Response
    {
        return $this->render('character_html/index.html.twig', [
            'characters' => $characterRepository->findAllByIntelligenceLevel($level),
            'level' => $level
        ]);
    }
}
