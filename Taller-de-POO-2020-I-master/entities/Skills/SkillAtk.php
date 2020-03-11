<?php

namespace entities\Skills;

use entities\Skills\Skill;

//una clase herencia para las sills agresivas, sus atributos incluyen el daño de armas y los multiplicadores de estadisticas de cada skill
class SkillAtk extends Skill
{
    private $WeaponDAtk;
    private $WeaponIAtk;
    private $mult = (["str" => 0, "intl" => 0, "agi" => 0]);

    // public function useSkill(){
    //     if($this->effect=="atk"){

    //     }
    // }

    public function __CONSTRUCT($name, $description, $type, $subtype, $effect, $WeaponDAtk, $WeaponIAtk, float $str, float $intl, float $agi)
    {
        parent::__CONSTRUCT($name, $description, $type, $subtype, $effect);
        $this->WeaponDAtk = $WeaponDAtk;
        $this->WeaponIAtk = $WeaponIAtk;
        $this->mult = ["str" => $str, "intl" => $intl, "agi" => $agi];
    }

    /**
     * Get the value of WeaponDAtk
     */
    public function getWeaponDAtk()
    {
        return $this->WeaponDAtk;
    }

    /**
     * Set the value of WeaponDAtk
     *
     * @return  self
     */
    public function setWeaponDAtk($WeaponDAtk)
    {
        $this->WeaponDAtk = $WeaponDAtk;

        return $this;
    }

    /**
     * Get the value of WeaponIAtk
     */
    public function getWeaponIAtk()
    {
        return $this->WeaponIAtk;
    }

    /**
     * Set the value of WeaponIAtk
     *
     * @return  self
     */
    public function setWeaponIAtk($WeaponIAtk)
    {
        $this->WeaponIAtk = $WeaponIAtk;

        return $this;
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

