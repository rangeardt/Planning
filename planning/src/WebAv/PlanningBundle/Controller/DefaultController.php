<?php

namespace WebAv\PlanningBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use WebAv\PlanningBundle\Entity\Reservation;



class DefaultController extends Controller
{
    public function indexAction($year)
    {

          $liste = $this->getDoctrine()
                      ->getManager()
                      ->getRepository('WebAvPlanningBundle:Reservation')
                      ->findAll();


    	 $ServiceDate = $this->container->get('webav_planning.date');

   		$dates=$ServiceDate->getAll($year);
		$datesJ=$ServiceDate->getAllJ($year);
        $mois=$this->getRequest()->query->get('mois');
        if( $mois == null ) $mois=date('n')-1;
        return $this->render('WebAvPlanningBundle:Default:index.html.twig', array(
        	'dates' => $dates ,
        	'datesJ' => $datesJ,
            'year'=>$year,
            'mois'=>$mois,
            'mounth'=>$ServiceDate->mounth,
            'days'=>$ServiceDate->days,
        	));
    }

    public function accueilAction(){
        return $this->render('WebAvPlanningBundle:Default:accueil.html.twig',array());
    }

}
