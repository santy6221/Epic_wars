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
$human = \entities\Managers\CharacterManager::create("Gerald", 1, 1, \entities\Races\Human::class, "Mago");
$orc = \entities\Managers\CharacterManager::create("Garrosh", 1, 1, \entities\Races\Orc::class, "Guerrero");
$dwarf = \entities\Managers\CharacterManager::create("Didi", 1, 1, \entities\Races\Dwarf::class, "Picaro");
$elf = \entities\Managers\CharacterManager::create("Didielfo", 1, 1, \entities\Races\Elf::class, "Mago");

\entities\Managers\DamageManager::takeDamage($human, 40, "Fisico");


//$human->setPlayableClass("Mago");
$golpeArma = new SkillAtk("Golpe con arma", "Se dan putazos", "Fisico", "Basico", "Atk", 1.00, 0.70, 1, 1, 1);
$golpeTrampero = new SkillAtk("Golpe trampero", "El personaje distrae a su oponente", "Fisico", "Picaro", "Atk", 1.50, 1.50, 1, 1, 1);
$tajoMortal = new SkillAtk("Tajo mortal", "El personaje salta con intenciones despiadas", "Fisico", "Guerrero", "Atk", 2.00, 2.00, 1, 1, 1);
$meditacion = new SkillStats("Meditaación", "El personaje medita", "Magico", "Basico", "Stats", 0, 0, 1.05, 1.05, 0, 0);
//"hp"=>0,"str"=>0,"intl"=>0,"agi"=>0,"pDef"=>0,"mDef"=>0
$calcinacion = new SkillAtk("Calcinación", "El personaje invoca el poder arcano y el elemento del fuego", "Magico", "Mago", "Atk", 0, 0, 0, 0.40, 0);
$tacticasCombate = new SkillStats("Tacticas de combate", "El personaje repasa el campo de batalla", "Fisico", "Avanzado", "Stats", 0, 1.05, 0, 1.05, 0, 0);


$espada1 = new Weapon("Espada de una mano", "", 1, 30, 0);
$espada2 = new Weapon("Espada de dos mano", "", 2, 30, 0);
$hacha1 = new Weapon("Hacha de una mano", "", 2, 30, 0);
$nada = new Weapon("", "", 1, 0, 0);

$human->setWeapons([0 => $nada, 1 => $nada,]);
$orc->setWeapons([0 => $nada, 1 => $nada,]);
$dwarf->setWeapons([0 => $nada, 1 => $nada,]);
$elf->setWeapons([0 => $nada, 1 => $nada,]);

\entities\Managers\WeaponManager::equipWeapon($espada1, $human, 1);
\entities\Managers\WeaponManager::equipWeapon($espada2, $human, 1);

//\entities\Managers\WeaponManager::equipWeapon($espada2,$orc,1);
//\entities\Managers\WeaponManager::equipWeapon($hacha1,$dwarf,1);
//\entities\Managers\WeaponManager::equipWeapon($hacha1,$dwarf,0);



\entities\Managers\SkillManager::learnSkill($golpeArma, $human);
\entities\Managers\SkillManager::learnSkill($meditacion, $human);
\entities\Managers\SkillManager::learnSkill($meditacion, $orc);

\entities\Managers\SkillManager::learnSkill($golpeArma, $elf);
\entities\Managers\SkillManager::forgetSkill($golpeArma, $orc);
\entities\Managers\SkillManager::learnSkill($golpeArma, $dwarf);



\entities\Managers\WeaponManager::removeWeapon($espada2, $human, 1);
echo ($human->getHands() . '<br>');
\entities\Managers\WeaponManager::equipWeapon($espada2, $human, 1);
echo ($human->getHands() . '<br>');

//$tmpSkills=$human->getSkills();

//\entities\Managers\DamageManager::attack($human, $tmpSkills[2], $orc);

\entities\Managers\DamageManager::useSkill($human, $golpeArma, $elf);
\entities\Managers\DamageManager::useSkill($human, $golpeArma, $elf);
\entities\Managers\DamageManager::useSkill($human, $golpeArma, $elf);
\entities\Managers\DamageManager::useSkill($human, $golpeArma, $elf);

\entities\Managers\DamageManager::revive($elf);


\entities\Managers\DamageManager::useSkill($elf, $calcinacion, $human);

echo $elf->getIntl();
