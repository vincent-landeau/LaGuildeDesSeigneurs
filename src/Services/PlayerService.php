<?php

namespace App\Services;

use App\Entity\Player;
use App\Repository\PlayerRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

class PlayerService implements PlayerServiceInterface
{
    private $playerRepository;
    private $em;

    public function __construct(
        PlayerRepository $playerRepository,
        EntityManagerInterface $em
    )
    {
        $this->playerRepository = $playerRepository;
        $this->em = $em;
    }

    /**
     * {@inheritdoc}
     */
    public function getAll()
    {
        $playersFinal = [];
        $players = $this->playerRepository->findAll();
        
        foreach ($players as $player) {
            $playersFinal[] = $player->toArray();
        }

        return $playersFinal;
    }

    /**
     * {@inheritdoc}
     */
    public function create(): Player
    {
        $player = new Player();
        $player
            ->setFirstname('Vincent')
            ->setLastname('Landeau')
            ->setEmail('vincentlandeau1999@gmail.com')
            ->setMirian(0)
            ->setCreation(new \DateTime())
        ;
        
        $this->em->persist($player);
        $this->em->flush();

        return $player;
    }

    /**
     * {@inheritdoc}
     */
    public function modify(Player $player): Player
    {
        $player
            ->setFirstname('Marius')
            ->setLastname('Proton')
            ->setEmail('marius@proton.com')
            ->setMirian(1000)
            ->setModification(new \DateTime())
        ;
        
        $this->em->persist($player);
        $this->em->flush();

        return $player;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(Player $player): bool
    {        
        $this->em->remove($player);

        $this->em->flush();

        return true;
    }
}
