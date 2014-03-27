<?php

namespace WebAv\PlanningBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use WebAv\PlanningBundle\Entity\Reservation;
use WebAv\PlanningBundle\Entity\Activite;
use WebAv\PlanningBundle\Form\ActiviteType;
use WebAv\PlanningBundle\Form\ReservationType;
use WebAv\UserBundle\Entity\User;

class DefaultController extends Controller
{
public function indexAction($year)
    {


      $ServiceDate = $this->container->get('webav_planning.date');

      $dates=$ServiceDate->getAll($year);
      $datesJ=$ServiceDate->getAllJ($year);
      $mois=$this->getRequest()->query->get('mois');
      if( $mois == null ) $mois=date('n')-1;
        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->findUserByUsername($this->container->get('security.context')
                      ->getToken()
                      ->getUser());
        $tab = $this->getDoctrine()
                      ->getManager()
                      ->getRepository('WebAvPlanningBundle:Reservation')
                      ->getEventByMonth($mois,2014,$user);
        return $this->render('WebAvPlanningBundle:Default:index.html.twig', array(
          'dates' => $dates ,
          'datesJ' => $datesJ,
            'year'=>$year,
            'mois'=>$mois,
            'mounth'=>$ServiceDate->mounth,
            'days'=>$ServiceDate->days,
            'reserv'=>$tab
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
 public function addactAction()
    {
      $Activite=new Activite();
      $form = $this->createForm(new ActiviteType, $Activite);

      $request = $this->get('request');
      if ($request->getMethod() == 'POST') {
        $form->bind($request);

        if ($form->isValid()) {
          $em = $this->getDoctrine()->getManager();
          $em->persist($Activite);
          $em->flush();

          return $this->redirect($this->generateUrl('webav_planning'));
        }
      }

      return $this->render('WebAvPlanningBundle:Default:formulaireActivite.html.twig', array(
        'form' => $form->createView(),
      ));
    }

    public function addresAction()
    {
      $Reservation = new Reservation;
      $form = $this->createForm(new ReservationType, $Reservation);
      $user= new User();
        $userManager = $this->container->get('fos_user.user_manager');

        $user = $userManager->findUserByUsername($this->container->get('security.context')
                      ->getToken()
                      ->getUser());
      $request = $this->get('request');
      if ($request->getMethod() == 'POST') {
        $form->bind($request);

        if ($form->isValid()) {
          $em = $this->getDoctrine()->getManager();
          $Reservation->setUsr($user);
          $em->persist($Reservation);
          $em->flush();

          return $this->redirect($this->generateUrl('webav_planning'));
        }
      }

      return $this->render('WebAvPlanningBundle:Default:formulaire.html.twig', array(
        'form' => $form->createView(),
      ));
    }
}
