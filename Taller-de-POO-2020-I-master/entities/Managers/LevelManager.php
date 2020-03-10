<?php

namespace entities\Managers;

use entities\Character;

class LevelManager {
    private static $baseExp = 100;
    private static $maxLevel = 100;
    private static $minLevel = 1;

    public static function levelUp(Character $character) {
        $character->setLevel($character->getLevel()+1);
    }
    public static function levelDown(Character $character) {
        $character->setLevel($character->getLevel()-1);
    }
    public static function getExpForLevel(Character $character) {
        $clvl=$character->getLevel();
        $nextxp=BASE_XP*$clvl+BASE_XP*($clvl-1);
    }
}
