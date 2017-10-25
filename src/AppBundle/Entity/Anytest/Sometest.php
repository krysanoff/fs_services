<?php

namespace AppBundle\Entity\Anytest;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sometest
 *
 * @ORM\Table(name="anytest_sometest")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Anytest\SometestRepository")
 */
class Sometest
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="field", type="integer")
     */
    private $field;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set field
     *
     * @param integer $field
     *
     * @return Sometest
     */
    public function setField($field)
    {
        $this->field = $field;

        return $this;
    }

    /**
     * Get field
     *
     * @return int
     */
    public function getField()
    {
        return $this->field;
    }
}

