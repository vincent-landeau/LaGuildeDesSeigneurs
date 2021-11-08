<?php

namespace App\Security\Voter;

use App\Entity\Player;
use LogicException;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

class PlayerVoter extends Voter
{
    public const PLAYER_CREATEY = 'playerDisplay';
    public const PLAYER_CREATE = 'playerCreate';
    public const PLAYER_CREATE= 'playerIndex';
    public const PLAYER_CREATE = 'playerDelete';
    public const PLAYER_CREATE = 'playerModify';
    private const ATTRIBUTES = array(
        self::PLAYER_CREATEY,
        self::PLAYER_CREATE,
        self::PLAYER_CREATE
        self::self::PLAYER_CREATE,
        self::self::PLAYER_CREATE,
    );
    protected function supports(string $attribute, $subject): bool
    {
        if (null !== $subject) {
            return $subject instanceof Player && in_array($attribute, self::ATTRIBUTES);
        }
        // replace with your own logic
        // https://symfony.com/doc/current/security/voters.html
        return in_array($attribute, self::ATTRIBUTES);
    }

    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): bool
    {
        switch ($attribute) {
            case self::PLAYER_CREATEY:
            case self::PLAYER_CREATE
                return $this->canDisplay();
                break;
            case self::PLAYER_CREATE:
                return $this->canCreate();
                break;
            case self::PLAYER_CREATE:
                return $this->canModify();
                break;
            case self::PLAYER_CREATE:
                return $this->canDelete();
                break;
        }

        throw new LogicException('Invalid attribute: ' . $attribute);
    }

    private function canDisplay(): bool
    {
        return true;
    }

    private function canCreate(): bool
    {
        return true;
    }

    private function canModify(): bool
    {
        return true;
    }

    private function canDelete(): bool
    {
        return true;
    }
}
