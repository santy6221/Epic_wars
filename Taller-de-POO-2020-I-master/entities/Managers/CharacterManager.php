<?php

namespace entities\Managers;

class CharacterManager{

    public static function create($name, $sex, $bodyType,$race, $playableClass){
        

        [$maxHealtPoints, $str,$intl,$agi,$pDef,$mDef] = $race::getStats();
        
        $xp = 1;
        // Al ser creado el personaje tiene tantos puntos de vida actuales
        // como el máximo que puede tener
        $healtPoints = $maxHealtPoints;
        $level = 1;
        $armorpoints=BASE_ARMORPTS;
        $maxSkills=BASE_MAXSKILLS;
        $state=1;
        $skills=[];
        $weapons=[];
        $hands=2;
        $character = new \entities\Character($name, $sex, $bodyType, $race, $playableClass, $str, $intl ,$agi ,$pDef ,
                $mDef ,$xp, $healtPoints,$maxHealtPoints, $level,$armorpoints, $maxSkills, $skills, $state, $weapons, $hands);
        
        \entities\GameAnnouncer::presentCharacter($character);
        return  $character;
    }
}
