<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use AppBundle\Entity\Tag;


/**
 * Class AdminController
 * @package AppBundle\Controller
 *
 * @Route("/admin")
 */
class AdminController extends Controller
{

    /**
     * @Route("/", name="admin_index")
     */
    public function indexAction(Request $request)
    {
        //$this->denyAccessUnlessGranted('ROLE_USER', null, 'Unable to access this page!');

        $nurls = $this->getNurls();


        $templateName = '/admin/index';
        return $this->render($templateName . '.html.twig', $nurls);

        // if get here, not logged in,
        // empty flash bag and create flash login first message then redirect
//        $session->getFlashBag()->clear(); // avoids seeing message twice ...
//
//        $this->addFlash(
//            'error',
//            'please login before accessing admin'
//        );
//
//        return $this->redirectToRoute('security_login');
    }

    private function getNurls(){
        $em = $this->getDoctrine()->getManager();

        $nurls = $em->getRepository('AppBundle:Nurl')->findAll();

        return array(
            'nurls' => $nurls
        );
    }
}