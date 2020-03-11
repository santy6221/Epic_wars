<?php

namespace entities\Skills;

use entities\Skills\Skill;

//una clase herencia para las skills de mejora, los multiplicadores de estadisticas de cada skill
class SkillStats extends Skill
{
    private $mult = (["hp" => 0, "str" => 0, "intl" => 0, "agi" => 0, "pDef" => 0, "mDef" => 0]);

    public function __CONSTRUCT($name, $description, $type, $subtype, $effect, float $hp, float $str, float $intl, float $agi, float $pDef, float $mDef)
    {
        parent::__CONSTRUCT($name, $description, $type, $subtype, $effect);
        $this->mult = ["hp" => $hp, "str" => $str, "intl" => $intl, "agi" => $agi, "pDef" => $pDef, "mDef" => $mDef];
    }



    /**
     * Get the value of mult
     */
    public function getMult()
    {
        return $this->mult;
    }

    /**
     * Set the value of mult
     *
     * @return  self
     */
    public function setMult($mult)
    {
        $this->mult = $mult;

        return $this;
    }
}
