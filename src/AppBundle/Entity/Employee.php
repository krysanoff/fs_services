<?php
/**
 * @license MIT
 */
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Employee
 *
 * @ORM\Table(name="employee")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EmployeeRepository")
 */
class Employee
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @Assert\NotBlank
     * @Assert\Length(
     *     min = 2,
     *     max = 30,
     *     minMessage="message.employee.lastname.min",
     *     maxMessage="message.employee.lastname.max"
     *     )
     *
     * @ORM\Column(name="lastname", type="string", length=30)
     */
    private $lastname;

    /**
     * @var string
     *
     * @Assert\NotBlank
     * @Assert\Length(
     *     min = 2,
     *     max = 15,
     *     minMessage="message.employee.firstname.min",
     *     maxMessage="message.employee.firstname.max"
     *     )
     *
     * @ORM\Column(name="firstname", type="string", length=15)
     */
    private $firstname;

    /**
     * @var string
     *
     * @Assert\NotBlank
     * @Assert\Length(
     *     min = 6,
     *     max = 20,
     *     minMessage="message.employee.middlename.min",
     *     maxMessage="message.employee.middlename.max"
     *     )
     *
     * @ORM\Column(name="middlename", type="string", length=20)
     */
    private $middlename;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, unique=true, nullable=true)
     */
    private $image;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Position", inversedBy="employees")
     * @ORM\JoinColumn(name="position_id", referencedColumnName="id")
     *
     */
    private $position;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Rank", inversedBy="employees")
     * @ORM\JoinColumn(name="rank_id", referencedColumnName="id")
     *
     */
    private $rank;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Shift", inversedBy="employees")
     * @ORM\JoinColumn(name="shift_id", referencedColumnName="id")
     *
     */
    private $shift;

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
     * Set id
     *
     * @param string $id
     *
     * @return Employee
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Employee
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Employee
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set middlename
     *
     * @param string $middlename
     *
     * @return Employee
     */
    public function setMiddlename($middlename)
    {
        $this->middlename = $middlename;

        return $this;
    }

    /**
     * Get middlename
     *
     * @return string
     */
    public function getMiddlename()
    {
        return $this->middlename;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Employee
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set shift
     *
     * @param integer $shift
     *
     * @return Employee
     */
    public function setShift($shift)
    {
        $this->shift = $shift;

        return $this;
    }

    /**
     * Get shift
     *
     * @return int
     */
    public function getShift()
    {
        return $this->shift;
    }

    /**
     * Set position
     *
     * @param string $position
     *
     * @return Employee
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get $this->position
     *
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set $this->rank
     *
     * @param string $rank
     *
     * @return Employee
     */
    public function setRank($rank)
    {
        $this->rank = $rank;

        return $this;
    }

    /**
     * Get $this->rank
     *
     * @return string
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * Get full name
     *
     * @return string
     */
    public function getFullname()
    {
        return $this->lastname." ".mb_substr($this->firstname, 0, 1).".".mb_substr($this->middlename, 0, 1).".";
    }
}
