<?php

//Creo que esto ya esta c:

namespace entities\Managers;

use entities\Character;
use entities\Skills\Skill;

class SkillManager
{

    //verifica si un personaje puede aprender cierta skill, y en el caso de poder, la aprende
    public static function learnSkill(Skill $skill, Character $character)
    {
        $tmpSkills = $character->getSkills();
        echo $character->getName() . " intenta aprender " . $skill->getName() . "</br>";

        if (count($tmpSkills) < $character->getMaxSkills()) {
            if (array_search($skill, $character->getSkills()) == FALSE) {
                if (SkillManager::validateSkill($skill, $character)) {
                    array_push($tmpSkills, $skill);
                    $character->setSkills($tmpSkills);
                    echo ($character->getName() . " ha aprendido " . $skill->getName() . '<br>');
                } else {
                    echo ($character->getName() . " no puede aprender esa skill" . '<br>');
                }
            } else
                echo ($character->getName() . " ya ha aprendido " . $skill->getName() . " en el pasado" . '<br>');
        } else {
            echo ($character->getName() . " no puede aprender mas skills" . '<br>');
        }
    }


    //elimina una skill del array de estas del personaje
    public static function forgetSkill(Skill $skill, Character $character)
    {
        $tmpSkills = $character->getSkills();
        $pos = array_search($skill, $tmpSkills);
        //echo $pos.'<br>';
        if ($pos < $character->getMaxSkills()) {
            unset($tmpSkills[$pos]);
            array_values($tmpSkills);
            echo ($character->getName() . " ha olvidado " . $skill->getName() . '<br>');
        }
        $character->setSkills($tmpSkills);
    }

    //valida la compatibilidad de un personaje y una skill que desea aprender
    public static function validateSkill(Skill $skill, Character $character)
    {
        switch ($character->getPlayableClass()) {
            case 'Mago':

                //mago aprende magicas y fisicas/basicas
                if ($skill->getType() == "Magico") {
                    return true;
                } else {
                    if ($skill->getSubType() == "Basico") {
                        return true;
                    }
                }
                break;
            case 'Guerrero':

                //los guerreros solo aprender fisicos
                if ($skill->getType() == "Fisico") {
                    return true;
                }
                break;
            case 'Picaro':

                //los picaros aprender basicas y propias
                if ($skill->getSubType() == "Basico" || $skill->getSubType() == "Picaro") {
                    return true;
                }
                break;

            default:
                echo ("Las clases admitidas son: 'Mago', 'Guerrero' y 'Picaro'" . '<br>');
                return false;
                break;
        }
        return false;
    }
}
