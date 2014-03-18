<?php

namespace WebAv\PlanningBundle\Entity;

use Doctrine\ORM\EntityRepository;
use \Datetime;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;
/**
 * ReservationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ReservationRepository extends EntityRepository
{
	public function getEventByMonth($month,$year,$user)
	{



	
	  $debut=new Datetime($year.'-'.($month+1).'-01');
	  $fin=new Datetime($year.'-'.($month+2).'-01');

	  $qb = $this->createQueryBuilder('Reserv')
	  		->leftJoin('Reserv.usr', 'u')
	  		->leftJoin('Reserv.date', 'd')
	  		->leftJoin('Reserv.activite', 'a');

	  $qb->where('u.id = :utilisateur')
	  	 ->setParameter('utilisateur', $user);


	  $qb->andWhere('d.date BETWEEN :debut AND :fin')
      	 ->setParameter('debut', $debut)  // Date entre le 1er janvier de cette année
      	 ->setParameter('fin', $fin); // Et le 31 décembre de cette année

	  // On peut ajouter ce qu'on veut après
	  $qb->orderBy('d.date', 'ASC');
	  $tab=$qb->getQuery()->getResult();
	  $mesreserv=array();
	  foreach ($tab as $key => $r) {
		$r['date']->getDate()	  	
	  }
	 return $tab;

	}
}
