<?php

use entities\Managers\SkillManager;
//use entities\Skills\Skill;
use entities\Skills\SkillAtk;
use entities\Skills;
use entities\Skills\SkillStats;
use entities\Weapon;

require './config.php';
// usamos namespaces para estructurar con más orden nuestras clases
// el \ inicial nos ayuda a que la ruta sea desde la raíz en lugar de tomar
// la ruta dinámica desde el punto en donde estamos importando una clase
//creacion de personajes
$human = \entities\Managers\CharacterManager::create("Gerald", 1, 1, \entities\Races\Human::class, "Mago");
$orc = \entities\Managers\CharacterManager::create("Garrosh", 1, 1, \entities\Races\Orc::class, "Guerrero");
$dwarf = \entities\Managers\CharacterManager::create("Didi", 1, 1, \entities\Races\Dwarf::class, "Picaro");
$elf = \entities\Managers\CharacterManager::create("Link", 1, 1, \entities\Races\Elf::class, "Mago");

//prueba de daño
\entities\Managers\DamageManager::takeDamage($human, 40, "Fisico");


//creacion de skills
$golpeArma = new SkillAtk("Golpe con arma", "Se dan putazos", "Fisico", "Basico", "Atk", 1.00, 0.70, 0, 0, 0);
$golpeTrampero = new SkillAtk("Golpe trampero", "El personaje distrae a su oponente", "Fisico", "Picaro", "Atk", 1.50, 1.50, 0, 0, 0);
$tajoMortal = new SkillAtk("Tajo mortal", "El personaje salta con intenciones despiadas", "Fisico", "Guerrero", "Atk", 2.00, 2.00, 0, 0, 0);
$meditacion = new SkillStats("Meditaación", "El personaje medita", "Magico", "Basico", "Stats", 0, 0, 1.05, 1.05, 0, 0);
//"hp"=>0,"str"=>0,"intl"=>0,"agi"=>0,"pDef"=>0,"mDef"=>0
$calcinacion = new SkillAtk("Calcinación", "El personaje invoca el poder arcano y el elemento del fuego", "Magico", "Mago", "Atk", 0, 0, 0, 0.40, 0);
$tacticasCombate = new SkillStats("Tacticas de combate", "El personaje repasa el campo de batalla", "Fisico", "Avanzado", "Stats", 0, 1.05, 0, 1.05, 0, 0);

//creacion de armas
$espada1 = new Weapon("Espada de una mano", "", 1, 30, 0);
$espada2 = new Weapon("Espada de dos mano", "", 2, 30, 0);
$hacha1 = new Weapon("Hacha de una mano", "", 2, 30, 0);
$nada = new Weapon("", "", 1, 0, 0);

//se asignan los espacios de arma
$human->setWeapons([0 => $nada, 1 => $nada,]);
$orc->setWeapons([0 => $nada, 1 => $nada,]);
$dwarf->setWeapons([0 => $nada, 1 => $nada,]);
$elf->setWeapons([0 => $nada, 1 => $nada,]);

//se equipan armas, no se equipan armas de 2 manos sobre aras de 1
\entities\Managers\WeaponManager::equipWeapon($espada1, $human, 1);
\entities\Managers\WeaponManager::equipWeapon($espada2, $human, 1);
\entities\Managers\WeaponManager::equipWeapon($espada2, $dwarf, 1);
\entities\Managers\WeaponManager::equipWeapon($hacha1, $elf, 1);


//aprender skills
\entities\Managers\SkillManager::learnSkill($golpeArma, $human);
\entities\Managers\SkillManager::learnSkill($meditacion, $human);
\entities\Managers\SkillManager::learnSkill($meditacion, $orc);
\entities\Managers\SkillManager::learnSkill($golpeArma, $elf);
\entities\Managers\SkillManager::learnSkill($meditacion, $orc);
\entities\Managers\SkillManager::learnSkill($meditacion, $human);

\entities\Managers\SkillManager::learnSkill($golpeArma, $elf);
\entities\Managers\SkillManager::forgetSkill($golpeArma, $orc);
\entities\Managers\SkillManager::learnSkill($golpeArma, $dwarf);


//desequipar un arma no equipada
\entities\Managers\WeaponManager::removeWeapon($espada2, $human, 1);
//echo ($human->getHands() . '<br>');
\entities\Managers\WeaponManager::equipWeapon($espada2, $human, 1);
//echo ($human->getHands() . '<br>');


//uso de skills agresivas y de mejora
\entities\Managers\DamageManager::useSkill($human, $golpeArma, $elf);
\entities\Managers\DamageManager::useSkill($human, $golpeArma, $elf);
\entities\Managers\DamageManager::useSkill($human, $golpeArma, $elf);
\entities\Managers\DamageManager::useSkill($human, $golpeArma, $elf);

//revivir, un personaje muerto no puede usar skills
\entities\Managers\DamageManager::revive($elf);


\entities\Managers\DamageManager::useSkill($elf, $calcinacion, $human);
\entities\Managers\DamageManager::useSkill($human, $golpeArma, $elf);
\entities\Managers\DamageManager::useSkill($human, $meditacion, $human);
\entities\Managers\DamageManager::useSkill($dwarf, $golpeArma, $human);
\entities\Managers\DamageManager::useSkill($elf, $calcinacion, $dwarf);
