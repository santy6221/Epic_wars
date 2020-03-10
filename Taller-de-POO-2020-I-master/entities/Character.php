<?php

namespace entities;

class Character {
    private $name = "";
    private $sex;
    private $bodyType;
    private $healtPoints;
    private $maxHealtPoints;
    private $level;
    private $str;
    private $intl;
    private $agi;
    private $pDef;
    private $mDef;
    private $xp;
    private $race;
    private $playableClass;
    private $armorPoints;
    private $maxSkills;
    private $skills = [];
    private $state;
    private $weapons= [0 => 0, 1 => 0];
    private $hands;

    public function __construct( $name, $sex, $bodyType, $race, $playableClass, $str, $intl ,$agi ,$pDef ,$mDef ,$xp, $healtPoints,$maxHealtPoints, $level, $armorPoints,$maxSkills, $skills, $state, $weapons, $hands)
    {
        $this->name = $name;
        $this->sex = $sex;
        $this->bodyType = $bodyType;
        $this->healtPoints = $healtPoints;
        $this->maxHealtPoints = $maxHealtPoints;
        $this->level = $level;
        $this->str = $str;
        $this->intl = $intl;
        $this->agi = $agi;
        $this->pDef = $pDef;
        $this->mDef = $mDef;
        $this->xp = $xp;
        $this->race = $race;
        $this->playableClass = $playableClass;
        $this->armorPoints = $armorPoints;
        $this->maxSkills = $maxSkills;
        $this->skills = $skills;
        $this->state = $state;
        $this->weapons = $weapons;
        $this->hands =$hands;
    }
    
    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of sex
     */ 
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set the value of sex
     *
     * @return  self
     */ 
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get the value of bodyType
     */ 
    public function getBodyType()
    {
        return $this->bodyType;
    }

    /**
     * Set the value of bodyType
     *
     * @return  self
     */ 
    public function setBodyType($bodyType)
    {
        $this->bodyType = $bodyType;

        return $this;
    }

    /**
     * Get the value of healtPoints
     */ 
    public function getHealtPoints()
    {
        return $this->healtPoints;
    }

    /**
     * Set the value of healtPoints
     *
     * @return  self
     */ 
    public function setHealtPoints($healtPoints)
    {
        $this->healtPoints = $healtPoints;

        return $this;
    }

    /**
     * Get the value of maxHealtPoints
     */ 
    public function getMaxHealtPoints()
    {
        return $this->maxHealtPoints;
    }

    /**
     * Set the value of maxHealtPoints
     *
     * @return  self
     */ 
    public function setMaxHealtPoints($maxHealtPoints)
    {
        $this->maxHealtPoints = $maxHealtPoints;

        return $this;
    }

    /**
     * Get the value of level
     */ 
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set the value of level
     *
     * @return  self
     */ 
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get the value of str
     */ 
    public function getStr()
    {
        return $this->str;
    }

    /**
     * Set the value of str
     *
     * @return  self
     */ 
    public function setStr($str)
    {
        $this->str = $str;

        return $this;
    }

    /**
     * Get the value of intl
     */ 
    public function getIntl()
    {
        return $this->intl;
    }

    /**
     * Set the value of intl
     *
     * @return  self
     */ 
    public function setIntl($intl)
    {
        $this->intl = $intl;

        return $this;
    }

    /**
     * Get the value of agi
     */ 
    public function getAgi()
    {
        return $this->agi;
    }

    /**
     * Set the value of agi
     *
     * @return  self
     */ 
    public function setAgi($agi)
    {
        $this->agi = $agi;

        return $this;
    }

    /**
     * Get the value of pDef
     */ 
    public function getPDef()
    {
        return $this->pDef;
    }

    /**
     * Set the value of pDef
     *
     * @return  self
     */ 
    public function setPDef($pDef)
    {
        $this->pDef = $pDef;

        return $this;
    }

    /**
     * Get the value of mDef
     */ 
    public function getMDef()
    {
        return $this->mDef;
    }

    /**
     * Set the value of mDef
     *
     * @return  self
     */ 
    public function setMDef($mDef)
    {
        $this->mDef = $mDef;

        return $this;
    }

    /**
     * Get the value of xp
     */ 
    public function getXp()
    {
        return $this->xp;
    }

    /**
     * Set the value of xp
     *
     * @return  self
     */ 
    public function setXp($xp)
    {
        $this->xp = $xp;

        return $this;
    }

    /**
     * Get the value of race
     */ 
    public function getRace()
    {
        return $this->race;
    }

    /**
     * Set the value of race
     *
     * @return  self
     */ 
    public function setRace($race)
    {
        $this->race = $race;

        return $this;
    }

    /**
     * Get the value of playableClass
     */ 
    public function getPlayableClass()
    {
        return $this->playableClass;
    }

    /**
     * Set the value of playableClass
     *
     * @return  self
     */ 
    public function setPlayableClass($playableClass)
    {
        $this->playableClass = $playableClass;

        return $this;
    }

    /**
     * Get the value of armorPoints
     */ 
    public function getArmorPoints()
    {
        return $this->armorPoints;
    }

    /**
     * Set the value of armorPoints
     *
     * @return  self
     */ 
    public function setArmorPoints($armorPoints)
    {
        $this->armorPoints = $armorPoints;

        return $this;
    }

    /**
     * Get the value of maxSkills
     */ 
    public function getMaxSkills()
    {
        return $this->maxSkills;
    }

    /**
     * Set the value of maxSkills
     *
     * @return  self
     */ 
    public function setMaxSkills($maxSkills)
    {
        $this->maxSkills = $maxSkills;

        return $this;
    }

    /**
     * Get the value of skills
     */ 
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * Set the value of skills
     *
     * @return  self
     */ 
    public function setSkills($skills)
    {
        $this->skills = $skills;

        return $this;
    }

    /**
     * Get the value of state
     */ 
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set the value of state
     *
     * @return  self
     */ 
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get the value of weapons
     */ 
    public function getWeapons()
    {
        return $this->weapons;
    }

    public function getWeapons0()
    {
        return $this->weapons[0];
    }

    public function getWeapons1()
    {
        return $this->weapons[1];
    }

    /**
     * Set the value of weapons
     *
     * @return  self
     */ 
    public function setWeapons($weapons)
    {
        $this->weapons = $weapons;

        return $this;
    }

    /**
     * Get the value of hands
     */ 
    public function getHands()
    {
        return $this->hands;
    }

    /**
     * Set the value of hands
     *
     * @return  self
     */ 
    public function setHands($hands)
    {
        $this->hands = $hands;

        return $this;
    }
}
