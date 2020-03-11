<?php

namespace entities\Managers;

use entities\Character;

class LevelManager
{
    //private static $baseExp = 100;
    private static $maxLevel = 100;
    //private static $minLevel = 1;

    private static function levelUp(Character $character)
    {
        if ($character->getLevel() < $this->maxLevel) {

            $character->setLevel($character->getLevel() + 1);
        } else {
            echo $character->getName() . " ya es de nivel maximo.";
        }
    }

    public static function levelDown(Character $character)
    {
        if ($character->getLevel() >= 2) {

            $character->setLevel($character->getLevel() - 1);
            echo $character->getName() . " ha perdido un nivel";
        }
    }

    public static function getExpForLevel(Character $character)
    {
        $clvl = $character->getLevel();
        $nextxp = BASE_XP * ($clvl + BASE_XP) * ($clvl - 1);

        return $nextxp;
    }

    public static function gainExp(Character $character)
    {
        $character->setXp($character->getXp() + 100);

        echo $character->getName() . " ha ganado 100 puntos de experiencia";

        $lvlup = self::getExpForLevel($character);

        if ($character->getXp() >= $lvlup) {
            self::levelUp($character);
        }
    }
}
