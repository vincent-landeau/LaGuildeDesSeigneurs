<?php 

namespace App\Services;

use App\Entity\Character;

interface CharacterServiceInterface
{
    /**
     * Creates the character.
     */
    public function create();

    /**
     * Gets all the character.
     */
    public function getAll();

    /**
     * Modifies the character.
     */
    public function modify(Character $character);

    /**
     * Deletes the character.
     */
    public function delete(Character $character);
}