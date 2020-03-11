<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace entities;

use entities\Skills\Skill;

/**
 * Description of GameAnnouncer
 *
 * @author pabhoz
 */
class GameAnnouncer
{

    public static function presentCharacter(\entities\Character $character)
    {
        echo $character->getName() . " se ha unido al mundo</br>";
        echo $character->getName() . " es un " . $character->getRace()::getRaceName() . "</br>";
        echo "Las estadísticas de " . $character->getName() . " son:</br>";
        echo "HP Max: " . $character->getMaxHealtPoints() . "</br>";
        echo "Str: " . $character->getStr() . "</br>";
        echo "Intl: " . $character->getIntl() . "</br>";
        echo "Agi: " . $character->getAgi() . "</br>";
        echo "PDef: " . $character->getPDef() . "</br>";
        echo "MDef: " . $character->getMDef() . "</br></br>";
    }
    public function anounceDead(Character $character)
    {
        echo $character->getName() . " esta muerto, no puede realizar esta accion";
    }
    public function anounceSkill(Character $character, Skill $skill)
    {

        if ($skill->getEffect() == "Stats") {
            echo ($character->getName() . " ha elegido un bufo." . '<br>');
        } else {
            echo ($character->getName() . " ha elegido un ataque." . '<br>');
        }
    }
    public function anounceAttack(Character $character, Skill $skill, Character $attacked)
    {
        echo $character->getName() . " ha atacado a " . $attacked->getName() . " usando " . $skill->getName() . "</br>";
    }
    public function anounceCriticalStrike()
    {
        echo ("Es una ataque critico." . '<br>');
    }
    public function anounceBuff(Character $caster)
    {
        echo "Las estadísticas de " . $caster->getName() . " ahora son:</br>";
        echo "HP Max: " . $caster->getMaxHealtPoints() . "</br>";
        echo "Str: " . $caster->getStr() . "</br>";
        echo "Intl: " . $caster->getIntl() . "</br>";
        echo "Agi: " . $caster->getAgi() . "</br>";
        echo "PDef: " . $caster->getPDef() . "</br>";
        echo "MDef: " . $caster->getMDef() . "</br></br>";
    }
    public function anounceDamage(Character $character, string $type)
    {
        echo ($character->getName() . " ha recibido daño " . $type . " y ahora sus health points son: " . $character->getHealtPoints() . '</br></br>');
    }
    public function anounceDeath(Character $character)
    {
        echo ($character->getName() . " ha muerto." . '<br>');
    }
    public function anounceRevival(Character $character)
    {
        echo ($character->getName() . " ha revivido." . '<br>');
    }
    public function anounceLearnSkillTry(Character $character, Skill $skill)
    {
        echo $character->getName() . " intenta aprender " . $skill->getName() . "</br>";
    }
    public function anounceLearnSkillSuccess(Character $character, Skill $skill)
    {
        echo ($character->getName() . " ha aprendido " . $skill->getName() . '<br>');
    }
    public function anounceLearnSkillFail(Character $character)
    {
        echo ($character->getName() . " no puede aprender esa skill" . '<br>');
    }
    public function anounceAlreadyLearned(Character $character, Skill $skill)
    {
        echo ($character->getName() . " ya ha aprendido " . $skill->getName() . " en el pasado" . '<br>');
    }
    public function anounceCannotLearn(Character $character)
    {
        echo ($character->getName() . " no puede aprender mas skills" . '<br>');
    }
    public function anounceForgetSkill(Character $character, Skill $skill)
    {
        echo ($character->getName() . " ha olvidado " . $skill->getName() . '<br>');
    }
    public function anounceAdmitedClass()
    {
        echo ("Las clases admitidas son: 'Mago', 'Guerrero' y 'Picaro'" . '<br>');
    }
    public function anounceLvlUp(Character $character)
    {
        echo $character->getName() . " ha subido de nivel.</br>";
    }
    public function anounceMaxLvl(Character $character)
    {
        echo $character->getName() . " ya es de nivel maximo.</br>";
    }
    public function anounceLvlDown(Character $character)
    {
        echo $character->getName() . " ha perdido un nivel.</br>";
    }
    public function anounceMinLvl(Character $character)
    {
        echo $character->getName() . " es demasiado debil para bajar de nivel</br>";
    }
    public function anounceGainXp(Character $character)
    {
        echo $character->getName() . " ha ganado 100 puntos de experiencia.</br>";
    }
    public function anounceEquipOneHand(Character $character, Weapon $weapon, int $hand)
    {
        echo ($character->getName() . " se ha equipado " . $weapon->getName() . " en la mano " . $hand . '<br>');
    }
    public function anounceEquipTwoHand(Character $character, Weapon $weapon)
    {
        echo ($character->getName() . " se ha equipado " . $weapon->getName() . " en ambas manos" . '<br>');
    }
    public function anounceCannotEquip(Character $character)
    {
        echo ($character->getName() . " no puede equipar esta arma, debe remover una primero." . '<br>');
    }
    public function anounceRemoveEquip(Character $character, Weapon $weapon, int $hand)
    {
        echo ($character->getName() . " se ha quitado su " . $weapon->getName() . " de la mano " . $hand . '<br>');
    }
    public function anounceCannotRemove(Character $character, Weapon $weapon)
    {
        echo ($character->getName() . " no tiene " . $weapon->getName() . " equipado en esa mano." . '<br>');
    }
}
