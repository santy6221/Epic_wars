<?php

namespace entities\Managers;

use entities\Character;
use entities\Skills\Skill;

class DamageManager
{
        public static function die(Character $character)
        {
                $character->setState(0);
                echo ($character->getName() . " ha muerto." . '<br>');
        }

        public static function revive(Character $character)
        {
                $character->setState(1);
                echo ($character->getName() . " ha revivido." . '<br>');
        }

        public static function useSkill(Character $character, Skill $skill, Character $objective)
        {

                if ($skill->getEffect() == "buff") {
                        self::buffs($character, $skill);
                } else {
                        self::attack($character, $skill, $objective);
                }
        }

        private static function attack(Character $attacker, Skill $skill, Character $attacked)
        {
                LevelManager::gainExp($attacker);

                if ($skill->getType() == "physical") {
                } else {
                }
        }
        private static function buffs(Character $caster, Skill $skill)
        {
                LevelManager::gainExp($caster);
        }

        public static function takeDamage(Character $character, float $damage, $type)
        {
                //armadura
                $finalDamage = $damage - (0.01 * ($character->getArmorPoints() / 10));

                //defensa segun tipo de ataque
                if ($type == "Fisico") {
                        $finalDamage = $damage - (0.20 * ($character->getPDef() / 10));
                } else {
                        $finalDamage = $damage - (0.20 * ($character->getMDef() / 10));
                }
                $character->setHealtPoints($character->getHealtPoints() - $finalDamage);

                if ($character->getHealtPoints() <= 0) {
                        DamageManager::die($character);
                        LevelManager::levelDown($character);
                } else {
                        echo ($character->getName() . " ha recibido daño y ahora sus health points son: " . $character->getHealtPoints() . '<br>');
                }
        }
}
