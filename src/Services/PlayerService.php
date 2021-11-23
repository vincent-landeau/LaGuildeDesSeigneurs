<?php

namespace App\Services;

use App\Entity\Player;
use App\Form\PlayerType;
use App\Repository\PlayerRepository;
use App\Event\PlayerEvent;

use DateTime;
use Doctrine\ORM\EntityManagerInterface;

use LogicException;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

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
        ValidatorInterface $validator,
        EventDispatcherInterface $dispatcher
    ) {
        $this->playerRepository = $playerRepository;
        $this->em = $em;
        $this->formFactory = $formFactory;
        $this->validator = $validator;
        $this->dispatcher = $dispatcher;
    }

    /**
     * {@inheritdoc}
     */
    public function getAll()
    {
        return $players = $this->playerRepository->findAll();
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
            throw new UnprocessableEntityHttpException((string) $errors . 'Missing data for Entity -> ' . $this->serializeJson($player));
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

        $event = new PlayerEvent($player);
        $this->dispatcher->dispatch($event, PlayerEvent::PLAYER_MODIFIED);

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

    /**
     * {@inheritdoc}
     */
    public function serializeJson($data)
    {
        $encoders = new JsonEncoder();
        $defaultContext = [
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($data) {
                return $data->getIdentifier();
            }
        ];
        $normalizers = new ObjectNormalizer(null, null, null, null, null, null, $defaultContext);
        $serializer = new Serializer([new DateTimeNormalizer(), $normalizers], [$encoders]);

        return $serializer->serialize($data, 'json');
    }
}
