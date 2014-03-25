<?php

namespace WebAv\PlanningBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActDate
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="WebAv\PlanningBundle\Entity\ActDateRepository")
 */
class ActDate
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
   * @ORM\ManyToOne(targetEntity="WebAv\PlanningBundle\Entity\Activite")
   * @ORM\JoinColumn(nullable=false)
   */
  private $activite;

     /**
   * @ORM\ManyToOne(targetEntity="WebAv\PlanningBundle\Entity\Date")
   * @ORM\JoinColumn(nullable=false)
   */
  private $date;
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
     * Set activite
     *
     * @param \WebAv\PlanningBundle\Entity\Activite $activite
     * @return ActDate
     */
    public function setActivite(\WebAv\PlanningBundle\Entity\Activite $activite)
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
     * Set date
     *
     * @param \WebAv\PlanningBundle\Entity\Date $date
     * @return ActDate
     */
    public function setDate(\WebAv\PlanningBundle\Entity\Date $date)
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
}
