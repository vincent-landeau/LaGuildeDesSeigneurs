<?php

namespace App\Services;

use App\Entity\Character;

interface CharacterServiceInterface
{
    /**
     * Creates the character.
     */
    public function create(string $data);

    public function isEntityFilled(Character $character);

    public function submit(Character $character, $formName, $data);

    /**
     * Gets all the character.
     */
    public function getAll();

    /**
     * Modifies the character.
     */
    public function modify(Character $character, string $data);

    /**
     * Deletes the character.
     */
    public function delete(Character $character);

    /**
     * Return random character images.
     */
    public function getImages(int $number);

    /**
     * Return character images by kind.
     */
    public function getImagesByKind(string $kind, int $number);

    /**
     * Return character whose intelligence level is greater than or equal to a number passed in the url.
     */
    public function getAllByIntelligenceLevel(int $level);

    /**
     * Deletes the player.
     */
    public function serializeJson($data);

    /**
     * Create the character form.
     */
    public function createFormHtml($character);

    /**
     * Modify the character form.
     */
    public function modifyFormHtml($character);
}
