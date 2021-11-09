<?php

namespace App\Services;

use App\Entity\Player;
use App\Form\PlayerType;
use App\Repository\PlayerRepository;

use DateTime;
use Doctrine\ORM\EntityManagerInterface;

use LogicException;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class PlayerService implements PlayerServiceInterface
{
    private $playerRepository;
    private $formFactory;
    private $em;
    private $validator;

    public function __construct(
        PlayerRepository $playerRepository,
        EntityManagerInterface $em,
        FormFactoryInterface $formFactory,
        ValidatorInterface $validator
    )
    {
        $this->playerRepository = $playerRepository;
        $this->em = $em;
        $this->formFactory = $formFactory;
        $this->validator = $validator;
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
    public function create(string $data)
    {
        $player = new Player();
        $player
            ->setIdentifier(hash('sha1', uniqid()))
            ->setCreation(new DateTime())
            ->setModification(new DateTime())
        ;
        $this->submit($player, PlayerType::class, $data);
        $this->isEntityFilled($player);

        $this->em->persist($player);
        $this->em->flush();

        return $player;
    }


    /**
     * {@inheritdoc}
     */
    public function isEntityFilled(Player $player)
    {
        $errors = $this->validator->validate($player);
        if (count($errors)) {
            throw new UnprocessableEntityHttpException((string) $errors . 'Missing data for Entity -> ' . json_encode($player->toArray()));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function submit(Player $player, $formName, $data)
    {
        $dataArray = is_array($data) ? $data : json_decode($data, true);

        //Bad array
        if (null !== $data && !is_array($dataArray)) {
            throw new UnprocessableEntityHttpException('Submitted data is not an array -> ' . $data);
        }

        //Submits form
        $form = $this->formFactory->create($formName, $player, ['csrf_protection' => false]);
        $form->submit($dataArray, false);//With false, only submitted fields are validated

        //Gets errors
        $errors = $form->getErrors();
        foreach ($errors as $error) {
            throw new LogicException('Error ' . get_class($error->getCause()) . ' --> ' . $error->getMessageTemplate() . ' ' . json_encode($error->getMessageParameters()));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function modify(Player $player, string $data)
    {
        $player->setModification(new \DateTime());
        $this->submit($player, PlayerType::class, $data);

        $this->em->persist($player);
        $this->em->flush();

        return $player;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(Player $player)
    {        
        $this->em->remove($player);

        return $this->em->flush();
    }
}
