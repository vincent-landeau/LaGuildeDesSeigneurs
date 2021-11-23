<?php

namespace App\Controller;

use App\Entity\Player;
use App\Services\PlayerServiceInterface;
use OpenApi\Annotations\AbstractAnnotation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Annotations as OA;

class PlayerController extends AbstractController
{
    private $playerService;

    public function __construct(PlayerServiceInterface $playerService)
    {
        $this->playerService = $playerService;
    }

    #[Route('/player', name: 'player_redirect_index', methods: ['HEAD', 'GET'])]
    /**
     * Redirect to index Route
     * @OA\Response(response= 302, description= "Redirect")
     * @OA\Tag(name= "Player")
     * */
    public function redirectIndex()
    {
        return $this->redirectToRoute('player_index');
    }

    #[Route('/player/index', name: 'player_index', methods: ['HEAD', 'GET'])]
    /**
     * Displays availables Players
     * @OA\Response(response= 200, description= "Success", @OA\Schema (type="array", ref=@Model(type= Playerphp::class)))
     * @OA\Response(response= 403, description= "Access denied")
     * @OA\Tag(name= "Playerphp")
     * */
    public function index(): JsonResponse
    {
        $this->denyAccessUnlessGranted('playerIndex', null);

        $players = $this->playerService->getAll();

        return JsonResponse::fromJsonString($this->playerService->serializeJson($players));
    }

    #[Route('/player/display/{identifier}', name: 'player_display', requirements: ['identifier' => '^([a-z0-9]{40})$'], methods: ['HEAD', 'GET'])]
    #[Entity("player", expr:"repository.findOneByIdentifier(identifier)")]
    /**
     * Displays a Player
     * @OA\Parameter(name= "identifier", in= "path", description= "identifier for the Player", required= true)
     * @OA\Response(response= 200, description= "Success", @Model(type= Player::class))
     * @OA\Response(response= 403, description= "Access denied")
     * @OA\Response(response= 404, description= "Not found")
     * @OA\Tag(name= "Player")
     * */
    public function display(Player $player)
    {
        $this->denyAccessUnlessGranted('playerDisplay', $player);
        return JsonResponse::fromJsonString($this->playerService->serializeJson($player));
    }
    /**
     * Creates a Player
     * @OA\Response(response= 200, description= "Success", @Model(type= Player::class))
     * @OA\Response(response= 403, description= "Access denied")
     * @OA\Response(response= 404, description= "Not found")
     * @OA\RequestBody(request= "Player", description= "Data for Player", required= true, @OA\MediaType (mediaType="application/json", @OA\Schema(ref= "#/components/schemas/Player")))
     * @OA\Tag(name= "Player")
     * */
    #[Route('/player/create', name: 'player_create', methods: ['HEAD', 'POST'])]
    public function create(Request $request)
    {
        $this->denyAccessUnlessGranted('playerCreate', null);
        $player = $this->playerService->create($request->getContent());

        return JsonResponse::fromJsonString($this->playerService->serializeJson($player));
    }

    #[Route('/player/modify/{identifier}', name: 'player_modify', requirements: ['identifier' => '^([a-z0-9]{40})$'], methods: ['PUT', 'HEAD'])]
    /**
     * Modifies a Player
     * @OA\Parameter(name= "identifier", in= "path", description= "identifier for the Player", required= true)
     * @OA\Response(response= 200, description= "Success", @Model(type= Player::class))
     * @OA\Response(response= 403, description= "Access denied")
     * @OA\Response(response= 404, description= "Not found")
     * @OA\Tag(name= "Player")
     * */
    public function modify(Request $request, Player $player)
    {
        $this->denyAccessUnlessGranted('playerModify', $player);
        $player = $this->playerService->modify($player, $request->getContent());

        return JsonResponse::fromJsonString($this->playerService->serializeJson($player));
    }

    #[Route('/player/delete/{identifier}', name: 'player_delete', requirements: ['identifier' => '^([a-z0-9]{40})$'], methods: ['DELETE', 'HEAD'])]
    /**
     * Deletes a Player
     * @OA\Response(response= 200, description= "Success", @OA\Schema (@OA\Property (property= "delete", type="boolean")))
     * @OA\Response(response= 403, description= "Access denied")
     * @OA\Parameter(name= "identifier", in= "path", description= "identifier for the Player", required= true)
     * @OA\Tag(name= "Player")
     * */
    public function delete(Player $player)
    {
        $this->denyAccessUnlessGranted('playerDelete', $player);
        $player = $this->playerService->delete($player);
    }
}
