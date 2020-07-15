<?php

include_once "BaseAuditEntity.php";

class Population extends BaseAuditEntity
{
    private $name;
    private $image;
    private $specie;
    private $length;
    private $weight;
    private $distribution;
    private $living_place;
    private $diet;
    private $status;
    private $description;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getSpecie()
    {
        return $this->specie;
    }

    /**
     * @param mixed $specie
     */
    public function setSpecie($specie)
    {
        $this->specie = $specie;
    }

    /**
     * @return mixed
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param mixed $length
     */
    public function setLength($length)
    {
        $this->length = $length;
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param mixed $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * @return mixed
     */
    public function getDistribution()
    {
        return $this->distribution;
    }

    /**
     * @param mixed $distribution
     */
    public function setDistribution($distribution)
    {
        $this->distribution = $distribution;
    }

    /**
     * @return mixed
     */
    public function getLivingPlace()
    {
        return $this->living_place;
    }

    /**
     * @param mixed $living_place
     */
    public function setLivingPlace($living_place)
    {
        $this->living_place = $living_place;
    }

    /**
     * @return mixed
     */
    public function getDiet()
    {
        return $this->diet;
    }

    /**
     * @param mixed $diet
     */
    public function setDiet($diet)
    {
        $this->diet = $diet;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

}