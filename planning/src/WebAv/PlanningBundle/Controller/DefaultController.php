<?php

namespace WebAv\PlanningBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use WebAv\PlanningBundle\Entity\Reservation;



class DefaultController extends Controller
{
    public function indexAction($year)
    {


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
        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->findUserByUsername($this->container->get('security.context')
                      ->getToken()
                      ->getUser());
        $tab = $this->getDoctrine()
                      ->getManager()
                      ->getRepository('WebAvPlanningBundle:Reservation')
                      ->getEventByMonth(2,2014,$user);
        return $this->render('WebAvPlanningBundle:Default:accueil.html.twig',array('tab'=>$tab));
    }

}
