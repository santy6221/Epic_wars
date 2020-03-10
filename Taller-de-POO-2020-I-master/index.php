<?php

use entities\Managers\SkillManager;
//use entities\Skills\Skill;
use entities\Skills\SkillAtk;
use entities\Skills;
use entities\Weapon;

require './config.php';
// usamos namespaces para estructurar con más orden nuestras clases
// el \ inicial nos ayuda a que la ruta sea desde la raíz en lugar de tomar
// la ruta dinámica desde el punto en donde estamos importando una clase
$human = \entities\Managers\CharacterManager::create("Gerald", 1, 1, \entities\Races\Human::class, "Mago");
$orc = \entities\Managers\CharacterManager::create("Garrosh", 1, 1, \entities\Races\Orc::class, "Guerrero");
//$dwarf = \entities\Managers\CharacterManager::create("Didi",1,1,\entities\Races\Dwarf::class,"Picaro");
//$human2 = \entities\Managers\CharacterManager::create("Didi",1,1,\entities\Races\Human::class,"Mago ");

\entities\Managers\DamageManager::takeDamage($human, 40, "Fisico");


//$human->setPlayableClass("Mago");
$golpeArma = new SkillAtk("Golpe con arma", "Se dan putazos", "Fisico", "Basico", "Atk", 1.00, 0.70);
$golpeTrampero = new SkillAtk("Golpe trampero", "El personaje distrae a su oponente", "Fisico", "Picaro", "Atk", 1.50, 1.50);
//$meditacion = new Skill("Meditaación","El personaje medita","Magico","Basico","Stats");
//$sdf=new SkillAtk();

$espada1 = new Weapon("Espada de una mano", "", 1, 30, 0);
$espada2 = new Weapon("Espada de dos mano", "", 2, 30, 0);
$hacha1 = new Weapon("Hacha de una mano", "", 2, 30, 0);

\entities\Managers\WeaponManager::equipWeapon($espada1, $human, 1);
\entities\Managers\WeaponManager::equipWeapon($espada2, $human, 1);

//\entities\Managers\WeaponManager::equipWeapon($espada2,$orc,1);
//\entities\Managers\WeaponManager::equipWeapon($hacha1,$dwarf,1);
//\entities\Managers\WeaponManager::equipWeapon($hacha1,$dwarf,0);



/*\entities\Managers\SkillManager::learnSkill($golpeArma,$human);
\entities\Managers\SkillManager::learnSkill($meditacion,$human);
\entities\Managers\SkillManager::learnSkill($meditacion,$orc);

\entities\Managers\SkillManager::learnSkill($golpeArma,$human);
\entities\Managers\SkillManager::forgetSkill($golpeArma,$human);
\entities\Managers\SkillManager::learnSkill($golpeArma,$human);*/



\entities\Managers\WeaponManager::removeWeapon($espada2, $human, 1);
echo ($human->getHands() . '<br>');
\entities\Managers\WeaponManager::equipWeapon($espada2, $human, 1);
echo ($human->getHands() . '<br>');

//$tmpSkills=$human->getSkills();

//\entities\Managers\DamageManager::attack($human, $tmpSkills[2], $orc);
