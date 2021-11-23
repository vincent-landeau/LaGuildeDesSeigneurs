<?php
namespace App\Event;

use App\Entity\Player;
use Symfony\Contracts\EventDispatcher\Event;

class PlayerEvent extends Event
{
    public const PLAYER_MODIFIED = 'app.player.modified';

    protected $player;

    /**
     * PlayerEvent constructor.
     * @param $player
     */
    public function __construct(Player $player)
    {
        $this->player = $player;
    }

    /**
     * @return Player
     */
    public function getPlayer(): Player
    {
        return $this->player;
    }



}