<?php

namespace entities;

class Weapon {
    private $name;
    private $description;
    private $type;
    private $pAtk;
    private $mAtk;

    public function __construct($name, $description, $type, $pAtk, $mAtk)
    {
        $this->name = $name;
        $this->description = $description;
        $this->type = $type;
        $this->pAtk = $pAtk;
        $this->mAtk = $mAtk;
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
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of pAtk
     */ 
    public function getPAtk()
    {
        return $this->pAtk;
    }

    /**
     * Set the value of pAtk
     *
     * @return  self
     */ 
    public function setPAtk($pAtk)
    {
        $this->pAtk = $pAtk;

        return $this;
    }

    /**
     * Get the value of mAtk
     */ 
    public function getMAtk()
    {
        return $this->mAtk;
    }

    /**
     * Set the value of mAtk
     *
     * @return  self
     */ 
    public function setMAtk($mAtk)
    {
        $this->mAtk = $mAtk;

        return $this;
    }
}
