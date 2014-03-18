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
     * @ORM\OneToOne(targetEntity="WebAv\UserBundle\Entity\User", cascade={"persist"})
     */
    private $usr;

   /**
     * @ORM\OneToOne(targetEntity="WebAv\PlanningBundle\Entity\Date", cascade={"persist"})
     */
    private $date;

   /**
     * @ORM\OneToOne(targetEntity="WebAv\PlanningBundle\Entity\Activite", cascade={"persist"})
     */
    private $activite;





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
     * @param \WebAv\PlanningBundle\Entity\User $usr
     * @return Reservation
     */
    public function setUsr(\WebAv\PlanningBundle\Entity\User $usr = null)
    {
        $this->usr = $usr;

        return $this;
    }

    /**
     * Get usr
     *
     * @return \WebAv\PlanningBundle\Entity\User 
     */
    public function getUsr()
    {
        return $this->usr;
    }

    /**
     * Set date
     *
     * @param \WebAv\PlanningBundle\Entity\Date $date
     * @return Reservation
     */
    public function setDate(\WebAv\PlanningBundle\Entity\Date $date = null)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \WebAv\PlanningBundle\Entity\Date 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set activite
     *
     * @param \WebAv\PlanningBundle\Entity\Activite $activite
     * @return Reservation
     */
    public function setActivite(\WebAv\PlanningBundle\Entity\Activite $activite = null)
    {
        $this->activite = $activite;

        return $this;
    }

    /**
     * Get activite
     *
     * @return \WebAv\PlanningBundle\Entity\Activite 
     */
    public function getActivite()
    {
        return $this->activite;
    }
}
