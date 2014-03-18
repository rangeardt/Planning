<?php

namespace IUT\PlaningBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DateHeure
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IUT\PlaningBundle\Entity\DateHeureRepository")
 */
class DateHeure
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
     * @var \DateTime
     *
     * @ORM\Column(name="quand", type="datetime")
     */
    private $quand;


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
     * Set quand
     *
     * @param \DateTime $quand
     * @return DateHeure
     */
    public function setQuand($quand)
    {
        $this->quand = $quand;

        return $this;
    }

    /**
     * Get quand
     *
     * @return \DateTime 
     */
    public function getQuand()
    {
        return $this->quand;
    }
}
