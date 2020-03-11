<?php

namespace entities\Managers;

use entities\Character;
use entities\GameAnnouncer;

class LevelManager
{
    //private static $baseExp = 100;
    private static $maxLevel = 100;
    //private static $minLevel = 1;

    private static function levelUp(Character $character)
    {
        if ($character->getLevel() < self::$maxLevel) {
            $character->setLevel($character->getLevel() + 1);
            GameAnnouncer::anounceLvlUp($character);
        } else {
            GameAnnouncer::anounceMaxLvl($character);
        }
    }

    public static function levelDown(Character $character)
    {
        if ($character->getLevel() >= 2) {

            $character->setLevel($character->getLevel() - 1);
            GameAnnouncer::anounceLvlDown($character);
        } else {
            GameAnnouncer::anounceMinLvl($character);
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

        GameAnnouncer::anounceGainXp($character);

        $lvlup = self::getExpForLevel($character);

        if ($character->getXp() >= $lvlup) {
            self::levelUp($character);
        }
    }
}
