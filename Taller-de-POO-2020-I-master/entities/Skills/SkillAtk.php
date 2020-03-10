<?php
namespace entities\Skills;
use entities\Skills\Skill;

class SkillAtk extends Skill{
    private $WeaponDAtk;
    private $WeaponIAtk;

    // public function useSkill(){
    //     if($this->effect=="atk"){

    //     }
    // }

    public function __CONSTRUCT($name, $description, $type, $subtype, $effect, $WeaponDAtk, $WeaponIAtk){
        parent::__CONSTRUCT($name, $description, $type, $subtype, $effect);
        $this->WeaponDAtk=$WeaponDAtk;
        $this->WeaponIAtk=$WeaponIAtk;
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
}

