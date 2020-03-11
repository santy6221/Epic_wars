<?php

namespace entities\Managers;

use entities\Character;
use entities\Skills\Skill;
use entities\Skills\SkillAtk;
use entities\Skills\SkillStats;

class DamageManager
{
        public static function die(Character $character)
        {
                $character->setState(0);
                echo ($character->getName() . " ha muerto." . '<br>');
                LevelManager::levelDown($character);
        }

        public static function revive(Character $character)
        {
                $character->setState(1);
                echo ($character->getName() . " ha revivido." . '<br>');
        }



        public static function useSkill(Character $character, Skill $skill, Character $objective)
        {
                if ($skill->getEffect() == "Stats") {
                        self::buffs($character, $skill);
                        echo ($character->getName() . " ha elegido un bufo." . '<br>');
                } else {
                        self::attack($character, $skill, $objective);
                        echo ($character->getName() . " ha elegido un ataque." . '<br>');
                }
        }
        // Recibe el skill a utilizar y realiza el calculo de daño a causar teniendo encuenta
        // que los atáques de tipo fisicos se benefician de la fuerza del personaje, así que
        // por cada 10 puntos de fuerza, el daño a realizar se aumenta en un 2%, así mismo por
        // cada 10 puntos de agilidad del personaje la probabilidad de un impacto crítico aumenta
        // en un 1%, si el impacto es crítico entonces el daño causado se multiplica por 150%; para
        // los ataques de tipo mágico funciona de la misma manera pero en este caso el intelecto es
        // quien incrementa el daño un 2% por cada 10 puntos.
        private static function attack(Character $attacker, SkillAtk $skill, Character $attacked)
        {
                echo ($attacker->getName() . " ha atacado a " . $attacked->getName() . " con " . $skill->getName() . '<br>');
                LevelManager::gainExp($attacker);
                $atk = 0;
                $critico = ($attacker->getAgi() / 10) * 0.01;
                $v_armas = $attacker->getWeapons();
                $v_mult = $skill->getMult();
                $v_stats_attacker = (["str" => $attacker->getStr(), "intl" => $attacker->getIntl(), "agi" => $attacker->getAgi()]);
                //private $mult=(["str"=>0,"intl"=>0,"agi"=>0]);

                if ($skill->getType() == "Fisico") {
                        $bonusTipo = ($attacker->getStr() / 10) * 0.02;
                        $atk += $v_armas[0]->getPAtk() * $skill->getWeaponIAtk();
                        $atk += $v_armas[1]->getPAtk() * $skill->getWeaponDAtk();
                } else {
                        //El personaje invoca el poder arcano y el elemento
                        //del fuego para quemar a su enemigo inflingiendo 40% de su intelecto como daño mágico.
                        $bonusTipo = ($attacker->getIntl() / 10) * 0.02;
                        $atk += $v_armas[0]->getMAtk() * $skill->getWeaponIAtk();
                        $atk += $v_armas[1]->getMAtk() * $skill->getWeaponDAtk();
                        $atk = $atk + $v_mult["str"] * $v_stats_attacker["str"];
                        $atk = $atk + $v_mult["intl"] * $v_stats_attacker["intl"];
                        $atk = $atk + $v_mult["agi"] * $v_stats_attacker["agi"];
                }

                if (rand(0, 100) < $critico) {
                        $atk = $atk * 1.5;
                        echo ("Es una ataque critico." . '<br>');
                }
                $atk = $atk * (1 + $bonusTipo);
                self::takeDamage($attacked, $atk, $skill->getType());
        }



        private static function buffs(Character $caster, SkillStats $skill)
        {
                //"hp"=>0,"str"=>0,"intl"=>0,"agi"=>0,"pDef"=>0,"mDef"=>0
                $v_buffs = $skill->getMult();
                $caster->setHealtPoints($caster->getHealtPoints() * $v_buffs["hp"]);
                $caster->setStr($caster->getStr() * $v_buffs["str"]);
                $caster->setIntl($caster->getIntl() * $v_buffs["intl"]);
                $caster->setAgi($caster->getAgi() * $v_buffs["agi"]);
                $caster->setPDef($caster->getPDef() * $v_buffs["pDef"]);
                $caster->setMDef($caster->getMDef() * $v_buffs["mDef"]);
                LevelManager::gainExp($caster);

                echo "Las estadísticas de " . $caster->getName() . " ahora son:</br>";
                echo "HP Max: " . $caster->getMaxHealtPoints() . "</br>";
                echo "Str: " . $caster->getStr() . "</br>";
                echo "Intl: " . $caster->getIntl() . "</br>";
                echo "Agi: " . $caster->getAgi() . "</br>";
                echo "PDef: " . $caster->getPDef() . "</br>";
                echo "MDef: " . $caster->getMDef() . "</br></br>";
        }

        public static function takeDamage(Character $character, float $damage, string  $type)
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
                } else {
                        echo ($character->getName() . " ha recibido daño " . $type . " y ahora sus health points son: " . $character->getHealtPoints() . '</br></br>');
                }
        }
}

