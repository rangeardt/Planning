<?php

namespace WebAv\PlanningBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="WebAv\PlanningBundle\Entity\ReservationRepository")
 */
class Reservation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;



/**
   * @ORM\ManyToOne(targetEntity="WebAv\UserBundle\Entity\User")
   * @ORM\JoinColumn(nullable=false)
   */
  private $usr;

/**
   * @ORM\OneToOne(targetEntity="WebAv\PlanningBundle\Entity\ActDate", cascade={"persist"})
   */
  
  private $actdate;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set usr
     *
     * @param \WebAv\UserBundle\Entity\User $usr
     * @return Reservation
     */
    public function setUsr(\WebAv\UserBundle\Entity\User $usr)
    {
        $this->usr = $usr;

        return $this;
    }

    /**
     * Get usr
     *
     * @return \WebAv\UserBundle\Entity\User 
     */
    public function getUsr()
    {
        return $this->usr;
    }

    /**
     * Set actdate
     *
     * @param \WebAv\PlanningBundle\Entity\ActDate $actdate
     * @return Reservation
     */
    public function setActdate(\WebAv\PlanningBundle\Entity\ActDate $actdate = null)
    {
        $this->actdate = $actdate;

        return $this;
    }

    /**
     * Get actdate
     *
     * @return \WebAv\PlanningBundle\Entity\ActDate 
     */
    public function getActdate()
    {
        return $this->actdate;
    }
}
