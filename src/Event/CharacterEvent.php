<?php
namespace App\Event;

use App\Entity\Character;
use Symfony\Contracts\EventDispatcher\Event;

class CharacterEvent extends Event
{
    public const CHARACTER_CREATED = 'app.character.created';

    protected $character;

    /**
     * CharacterEvent constructor.
     * @param $character
     */
    public function __construct(Character $character)
    {
        $this->character = $character;
    }

    /**
     * @return Character
     */
    public function getCharacter(): Character
    {
        return $this->character;
    }



}