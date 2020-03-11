<?php

namespace entities\Skills;

//una clas eabstracta con una herencia para las skills agresivas y otra herencia para las skills de mejora
abstract class Skill
{
    private $name;
    private $description;
    private $type;
    private $subtype;
    private $effect;

    public function __construct($name, $description, $type, $subtype, $effect)
    {
        $this->name = $name;
        $this->description = $description;
        $this->type = $type;
        $this->subtype = $subtype;
        $this->effect = $effect;
    }

    //public abstract function useSkill();



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

    public function getSubType()
    {
        return $this->subtype;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */
    public function setSubType($subtype)
    {
        $this->subtype = $subtype;

        return $this;
    }

    /**
     * Get the value of effect
     */
    public function getEffect()
    {
        return $this->effect;
    }

    /**
     * Set the value of effect
     *
     * @return  self
     */
    public function setEffect($effect)
    {
        $this->effect = $effect;

        return $this;
    }
}
