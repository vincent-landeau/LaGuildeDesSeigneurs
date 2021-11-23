<?php

namespace App\Controller;

use App\Entity\Character;
use App\Services\CharacterServiceInterface;
use OpenApi\Annotations\AbstractAnnotation;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Annotations as OA;

class CharacterController extends AbstractController
{
    private $characterService;

    public function __construct(CharacterServiceInterface $characterService)
    {
        $this->characterService = $characterService;
    }

    #[Route('/character', name: 'character_redirect_index', methods: ['HEAD', 'GET'])]
    /**
     * Redirect to index Route
     * @OA\Response(response= 302, description= "Redirect")
     * @OA\Tag(name= "Character")
     * */
    public function redirectIndex()
    {
        return $this->redirectToRoute('character_index');
    }

    #[Route('/character/index', name: 'character_index', methods: ['HEAD', 'GET'])]
    /**
     * Displays availables Characters
     * @OA\Response(response= 200, description= "Success", @OA\Schema (type="array", ref=@Model(type= Character::class)))
     * @OA\Response(response= 403, description= "Access denied")
     * @OA\Tag(name= "Character")
     * */
    public function index(): JsonResponse
    {
        $this->denyAccessUnlessGranted('characterIndex', null);

        $characters = $this->characterService->getAll();

        return JsonResponse::fromJsonString($this->characterService->serializeJson($characters));
    }

    #[Route('/character/display/{identifier}', name: 'character_display', requirements: ['identifier' => '^([a-z0-9]{40})$'], methods: ['GET', 'HEAD'])]

    /**
     * Displays a Character
     * @OA\Parameter(name= "identifier", in= "path", description= "identifier for the Character", required= true)
     * @OA\Response(response= 200, description= "Success", @Model(type= Character::class))
     * @OA\Response(response= 403, description= "Access denied")
     * @OA\Response(response= 404, description= "Not found")
     * @OA\Tag(name= "Character")
 * */
    #[Entity("character", expr:"repository.findOneByIdentifier(identifier)")]
    public function display(Character $character)
    {
        $this->denyAccessUnlessGranted('characterDisplay', $character);
        return JsonResponse::fromJsonString($this->characterService->serializeJson($character));
    }

    #[Route('/character/create', name: 'character_create', methods: ['HEAD', 'POST'])]
    /**
     * Creates a Character
     * @OA\Response(response= 200, description= "Success", @Model(type= Character::class))
     * @OA\Response(response= 403, description= "Access denied")
     * @OA\Response(response= 404, description= "Not found")
     * @OA\RequestBody(request= "Character", description= "Data for Character", required= true, @OA\MediaType (mediaType="application/json", @OA\Schema(ref= "#/components/schemas/Character")))
     * @OA\Tag(name= "Character")
     * */
    public function create(Request $request)
    {
        $this->denyAccessUnlessGranted('characterCreate', null);
        $character = $this->characterService->create($request->getContent());

        return JsonResponse::fromJsonString($this->characterService->serializeJson($character));
    }

    #[Route('/character/modify/{identifier}', name: 'character_modify', requirements: ['identifier' => '^([a-z0-9]{40})$'], methods: ['PUT', 'HEAD'])]
    /**
     * Modifies a Character
     * @OA\Parameter(name= "identifier", in= "path", description= "identifier for the Character", required= true)
     * @OA\Response(response= 200, description= "Success", @Model(type= Character::class))
     * @OA\Response(response= 403, description= "Access denied")
     * @OA\Response(response= 404, description= "Not found")
     * @OA\Tag(name= "Character")
     * */
    public function modify(Request $request, Character $character)
    {
        $this->denyAccessUnlessGranted('characterModify', $character);
        $character = $this->characterService->modify($character, $request->getContent());

        return JsonResponse::fromJsonString($this->characterService->serializeJson($character));
    }

    #[Route('/character/delete/{identifier}', name: 'character_delete', requirements: ['identifier' => '^([a-z0-9]{40})$'], methods: ['DELETE', 'HEAD'])]
    /**
     * Deletes a Character
     * @OA\Response(response= 200, description= "Success", @OA\Schema (@OA\Property (property= "delete", type="boolean")))
     * @OA\Response(response= 403, description= "Access denied")
     * @OA\Parameter(name= "identifier", in= "path", description= "identifier for the Character", required= true)
     * @OA\Tag(name= "Character")
     * */
    public function delete(Character $character)
    {
        $character = $this->characterService->delete($character);
        $this->denyAccessUnlessGranted('characterDelete', $character);
    }

    #[Route('/character/images/{number}', name: 'character_images', requirements: ['number' => '^([0-9]{1,2})$'], methods: ['GET', 'HEAD'])]
    public function images(int $number)
    {
        $this->denyAccessUnlessGranted('characterIndex', null);
        $images = $this->characterService->getImages($number);

        return new JsonResponse($images);
    }

    #[Route('/character/images/{kind}/{number}', name: 'character_images_by_kind', requirements: ['kind' => '^(dames|ennemies|ennemis|seigneurs)$', 'number' => '^([0-9]{1,2})$'], methods: ['GET', 'HEAD'])]
    public function imagesByKind(string $kind, int $number)
    {
        $this->denyAccessUnlessGranted('characterIndex', null);

        return new JsonResponse($this->characterService->getImagesByKind($kind, $number));
    }
}
