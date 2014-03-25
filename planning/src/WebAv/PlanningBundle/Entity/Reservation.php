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
   * @ORM\ManyToMany(targetEntity="WebAv\UserBundle\Entity\User", cascade={"persist"})
   */
  private $usr;

/**
   * @ORM\ManyToMany(targetEntity="WebAv\PlanningBundle\Entity\Date", cascade={"persist"})
   */
  private $date;
/**
   * @ORM\ManyToMany(targetEntity="WebAv\PlanningBundle\Entity\Activite", cascade={"persist"})
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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->date = new \Doctrine\Common\Collections\ArrayCollection();
        $this->activite = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add date
     *
     * @param \WebAv\PlanningBundle\Entity\Date $date
     * @return Reservation
     */
    public function addDate(\WebAv\PlanningBundle\Entity\Date $date)
    {
        $this->date[] = $date;

        return $this;
    }

    /**
     * Remove date
     *
     * @param \WebAv\PlanningBundle\Entity\Date $date
     */
    public function removeDate(\WebAv\PlanningBundle\Entity\Date $date)
    {
        $this->date->removeElement($date);
    }

    /**
     * Add activite
     *
     * @param \WebAv\PlanningBundle\Entity\Activite $activite
     * @return Reservation
     */
    public function addActivite(\WebAv\PlanningBundle\Entity\Activite $activite)
    {
        $this->activite[] = $activite;

        return $this;
    }

    /**
     * Remove activite
     *
     * @param \WebAv\PlanningBundle\Entity\Activite $activite
     */
    public function removeActivite(\WebAv\PlanningBundle\Entity\Activite $activite)
    {
        $this->activite->removeElement($activite);
    }

    /**
     * Add usr
     *
     * @param \WebAv\UserBundle\Entity\User $usr
     * @return Reservation
     */
    public function addUsr(\WebAv\UserBundle\Entity\User $usr)
    {
        $this->usr[] = $usr;

        return $this;
    }

    /**
     * Remove usr
     *
     * @param \WebAv\UserBundle\Entity\User $usr
     */
    public function removeUsr(\WebAv\UserBundle\Entity\User $usr)
    {
        $this->usr->removeElement($usr);
    }
}
