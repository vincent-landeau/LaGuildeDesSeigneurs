<?php

namespace App\Services;

use App\Entity\Character;
use App\Form\CharacterType;
use App\Repository\CharacterRepository;

use DateTime;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Finder\Finder;
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

class CharacterService implements CharacterServiceInterface
{
    private $characterRepository;
    private $formFactory;
    private $em;
    private $validator;

    public function __construct(
        CharacterRepository $characterRepository,
        EntityManagerInterface $em,
        FormFactoryInterface $formFactory,
        ValidatorInterface $validator
    ) {
        $this->characterRepository = $characterRepository;
        $this->em = $em;
        $this->formFactory = $formFactory;
        $this->validator = $validator;
    }

    /**
     * {@inheritdoc}
     */
    public function getAll()
    {
        return $this->characterRepository->findAll();
    }

    /**
     * {@inheritdoc}
     */
    public function create(string $data)
    {
        //Use with {"kind":"Dame","name":"Eldalótë","surname":"Fleur elfique","caste":"Elfe","knowledge":"Arts","intelligence":120,"life":12,"image":"/images/eldalote.jpg"}
        $character = new Character();
        $character
            ->setIdentifier(hash('sha1', uniqid()))
            ->setCreation(new DateTime())
            ->setModification(new DateTime())
        ;
        $this->submit($character, CharacterType::class, $data);
        $this->isEntityFilled($character);

        $this->em->persist($character);
        $this->em->flush();

        return $character;
    }

    /**
     * {@inheritdoc}
     */
    public function isEntityFilled(Character $character)
    {
        $errors = $this->validator->validate($character);
        if (count($errors)) {
            throw new UnprocessableEntityHttpException((string) $errors . 'Missing data for Entity -> ' . $this->serializeJson($character));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function submit(Character $character, $formName, $data)
    {
        $dataArray = is_array($data) ? $data : json_decode($data, true);

        //Bad array
        if (null !== $data && !is_array($dataArray)) {
            throw new UnprocessableEntityHttpException('Submitted data is not an array -> ' . $data);
        }

        //Submits form
        $form = $this->formFactory->create($formName, $character, ['csrf_protection' => false]);
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
    public function modify(Character $character, string $data)
    {
        $character->setModification(new \DateTime());
        $this->submit($character, CharacterType::class, $data);

        $this->em->persist($character);
        $this->em->flush();

        return $character;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(Character $character)
    {
        $this->em->remove($character);

        return $this->em->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function getImages(int $number)
    {
        $folder = __DIR__ . '/../../public/images';

        $finder = new Finder();
        $finder
            ->files()
            ->in($folder)
            ->notPath('/cartes/')
            ->sortByName()
        ;

        $images = [];
        foreach ($finder as $file) {
            $images[] = '/images/' . $file->getRelativePathname();
        }
        shuffle($images);

        return array_slice($images, 0, $number, true);
    }

    /**
     * {@inheritdoc}
     */
    public function getImagesByKind(string $kind, int $number)
    {
        $folder = __DIR__ . '/../../public/images' . $kind;

        $finder = new Finder();
        $finder
            ->files()
            ->in($folder)
            ->notPath('/cartes/')
            ->sortByName()
        ;

        $images = [];
        foreach ($finder as $file) {
            $images[] = '/images/' . $kind . '/' . $file->getRelativePathname();
        }
        shuffle($images);

        return array_slice($images, 0, $number, true);
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
