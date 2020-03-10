<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace entities;

/**
 * Description of GameAnnouncer
 *
 * @author pabhoz
 */
class GameAnnouncer {
    
    public static function presentCharacter(\entities\Character $character){ 
        echo $character->getName()." se ha unido al mundo</br>";
        echo $character->getName()." es un ".$character->getRace()::getRaceName()."</br>";
        echo "Las estadísticas de ".$character->getName()." son:</br>";
        echo "HP Max: ".$character->getMaxHealtPoints()."</br>";
        echo "Str: ".$character->getStr()."</br>";
        echo "Intl: ".$character->getIntl()."</br>";
        echo "Agi: ".$character->getAgi()."</br>";
        echo "PDef: ".$character->getPDef()."</br>";
        echo "MDef: ".$character->getMDef()."</br></br>";
    }
}
