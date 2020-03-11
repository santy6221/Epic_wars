<?php

//Creo que esto ya esta c:

namespace entities\Managers;

use entities\Character;
use entities\GameAnnouncer;
use entities\Weapon;

class WeaponManager
{
    private static $nada;

    //asigna o un arma de una mano a una de las manos del personaje que se toma como parametro, o asigna un arma de 2 manos a ambas
    public static function equipWeapon(Weapon $weapon, Character $character, int $hand)
    {
        $tmpWeapons = $character->getWeapons();

        if ($weapon->gettype() <= $character->getHands()) {
            if ($weapon->gettype() == 1) {
                $tmpWeapons[$hand] = $weapon;
                GameAnnouncer::anounceEquipOneHand($character, $weapon, $hand);
                $character->setHands($character->getHands() - 1);
            } else {
                $tmpWeapons[0] = $weapon;
                $tmpWeapons[1] = $weapon;

                GameAnnouncer::anounceEquipTwoHand($character, $weapon);
                $character->setHands(0);
            }
        } else {
            GameAnnouncer::anounceCannotEquip($character);
        }
        $character->setWeapons($tmpWeapons);
    }


    //vacia las manos
    public static function removeWeapon(Weapon $weapon, Character $character, int $hand)
    {
        $tmpWeapons = $character->getWeapons();

        if ($tmpWeapons[$hand] == $weapon) {
            if ($weapon->getType() == 2) {
                $tmpWeapons = [0 => self::$nada, 1 => self::$nada,];
                $character->setWeapons($tmpWeapons);
                $character->setHands(2);
            } else {
                $tmpWeapons[$hand] = self::$nada;
                $character->setHands($character->getHands() + 1);
            }
            $character->setWeapons($tmpWeapons);
            GameAnnouncer::anounceRemoveEquip($character, $weapon, $hand);
        } else {
            GameAnnouncer::anounceCannotRemove($character, $weapon);
        }
    }
}
