<?php

namespace App\Security\Voter;

use App\Entity\Character;
use LogicException;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

class CharacterVoter extends Voter
{
    public const CHARACTER_DISPLAY = 'characterDisplay';
    public const CHARACTER_CREATE = 'characterCreate';
    public const CHARACTER_INDEX = 'characterIndex';
<<<<<<< HEAD
    private const ATTRIBUTES = array(
        self::CHARACTER_DISPLAY,
        self::CHARACTER_CREATE,
        self::CHARACTER_INDEX,
    );
    protected function supports(string $attribute, $subject): bool
    {
        if (null !== $subject) {
            return $subject instanceof Character && in_array($attribute, self::ATTRIBUTES);
        }
        // replace with your own logic
        // https://symfony.com/doc/current/security/voters.html
=======
    public const CHARACTER_MODIFY = 'characterModify';
    public const CHARACTER_DELETE = 'characterDelete';

    private const ATTRIBUTES =  array(
        self::CHARACTER_DISPLAY,
        self::CHARACTER_CREATE,
        self::CHARACTER_INDEX,
        self::CHARACTER_MODIFY,
        self::CHARACTER_DELETE,
    );

    protected function supports(string $attribute, $subject): bool
    {
        if(null !== $subject) return $subject instanceof Character && in_array($attribute, self::ATTRIBUTES);

>>>>>>> main
        return in_array($attribute, self::ATTRIBUTES);
    }

    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): bool
    {
        switch ($attribute) {
<<<<<<< HEAD
            case self::CHARACTER_DISPLAY:
            case self::CHARACTER_INDEX:
                return $this->canDisplay();
                break;
            case self::CHARACTER_CREATE:
                return $this->canCreate();
                break;
        }

        throw new LogicException('Invalid attribute: ' . $attribute);
    }

    private function canDisplay(): bool
=======
            case self::CHARACTER_DISPLAY: 
                return $this->canDisplay();
                break;
            
            case self::CHARACTER_CREATE: 
                return $this->canCreate();
                break;

            case self::CHARACTER_INDEX: 
                return $this->canIndex();
                break;

            case self::CHARACTER_MODIFY: 
                return $this->canModify();
                break;
                
            case self::CHARACTER_DELETE: 
                return $this->canDelete();
                break;
        }

        throw new LogicException('Invalid attribute: ' . $attribute);

        return false;
    }

    /**
     * Checks if is allowed to display
     *
     * @return boolean
     */
    private function canDisplay()
    {
        return true;
    }

    /**
     * Checks if is allowed to create
     *
     * @return boolean
     */
    private function  canCreate()
    {
        return true;
    }

    /**
     * Checks if is allowed to index
     *
     * @return boolean
     */
    private function  canIndex()
    {
        return true;
    }

    /**
     * Checks if is allowed to modify
     *
     * @return boolean
     */
    private function  canModify()
>>>>>>> main
    {
        return true;
    }

<<<<<<< HEAD
    private function canCreate(): bool
=======
    /**
     * Checks if is allowed to delete
     *
     * @return boolean
     */
    private function  canDelete()
>>>>>>> main
    {
        return true;
    }
}
