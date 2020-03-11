<?php

//Creo que esto ya esta c:

namespace entities\Managers;

use entities\Character;
use entities\Weapon;

class WeaponManager
{
    private static $nada;
    public static function equipWeapon(Weapon $weapon, Character $character, int $hand)
    {
        $tmpWeapons=$character->getWeapons();

        if ($weapon->gettype()<=$character->getHands()) {
            if ($weapon->gettype()==1) {
                $tmpWeapons[$hand]=$weapon;
                echo($character->getName()." se ha equipado ".$weapon->getName()." en la mano ".$hand.'<br>');
                $character->setHands($character->getHands()-1);
            } else {
                $tmpWeapons[0]=$weapon;
                $tmpWeapons[1]=$weapon;

                echo($character->getName()." se ha equipado ".$weapon->getName()." en ambas manos".'<br>');
                $character->setHands(0);
            }
        } else {
            echo($character->getName()." no puede equipar esta arma, debe remover una primero.".'<br>');
        }
        $character->setWeapons($tmpWeapons);
    }

    
    public static function removeWeapon(Weapon $weapon, Character $character, int $hand)
    {
        $tmpWeapons=$character->getWeapons();

        if ($tmpWeapons[$hand]==$weapon) {
            if ($weapon->getType()==2) {
                $tmpWeapons=[0=>self::$nada,1=>self::$nada,];
                $character->setWeapons($tmpWeapons);
                $character->setHands(2);
            } else {
                $tmpWeapons[$hand]=self::$nada;
                $character->setHands($character->getHands()+1);
            }
            $character->setWeapons($tmpWeapons);
            echo($character->getName()." se ha quitado su ".$weapon->getName().'<br>');
        } else {
            echo($character->getName()." no tiene ".$weapon->getName()." equipado en esa mano.".'<br>');
        }
    }
}
