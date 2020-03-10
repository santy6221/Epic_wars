<?php

use entities\Skills\Skill;

class SkillStats extends Skill{
    private $multhealtPoints;
    private $multstr;
    private $multintl;
    private $multagi;
    private $multpDef;
    private $multmDef;


    public function __CONSTRUCT(){
        
    }


    /**
     * Get the value of multhealtPoints
     */ 
    public function getMulthealtPoints()
    {
        return $this->multhealtPoints;
    }

    /**
     * Set the value of multhealtPoints
     *
     * @return  self
     */ 
    public function setMulthealtPoints($multhealtPoints)
    {
        $this->multhealtPoints = $multhealtPoints;

        return $this;
    }

    /**
     * Get the value of multstr
     */ 
    public function getMultstr()
    {
        return $this->multstr;
    }

    /**
     * Set the value of multstr
     *
     * @return  self
     */ 
    public function setMultstr($multstr)
    {
        $this->multstr = $multstr;

        return $this;
    }

    /**
     * Get the value of multintl
     */ 
    public function getMultintl()
    {
        return $this->multintl;
    }

    /**
     * Set the value of multintl
     *
     * @return  self
     */ 
    public function setMultintl($multintl)
    {
        $this->multintl = $multintl;

        return $this;
    }

    /**
     * Get the value of multagi
     */ 
    public function getMultagi()
    {
        return $this->multagi;
    }

    /**
     * Set the value of multagi
     *
     * @return  self
     */ 
    public function setMultagi($multagi)
    {
        $this->multagi = $multagi;

        return $this;
    }

    /**
     * Get the value of multpDef
     */ 
    public function getMultpDef()
    {
        return $this->multpDef;
    }

    /**
     * Set the value of multpDef
     *
     * @return  self
     */ 
    public function setMultpDef($multpDef)
    {
        $this->multpDef = $multpDef;

        return $this;
    }

    /**
     * Get the value of multmDef
     */ 
    public function getMultmDef()
    {
        return $this->multmDef;
    }

    /**
     * Set the value of multmDef
     *
     * @return  self
     */ 
    public function setMultmDef($multmDef)
    {
        $this->multmDef = $multmDef;

        return $this;
    }

    /**
     * Get the value of multarmorPoints
     */ 

}