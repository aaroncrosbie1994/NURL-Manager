<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\Compiler\RepeatedPass;
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

        $templateName = '/admin/index';
        return $this->render($templateName . '.html.twig');

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

    /**
     * @Route("/nurls", name="admin_nurls")
     */
    public function nurlAction(Request $request)
    {
        $nurls = $this->getNurls();

        $templateName = '/admin/nurls';

        return $this->render($templateName . '.html.twig', $nurls);
    }

    /**
     * @Route("/tags", name="admin_tags")
     */
    public function tagAction(Request $request)
    {
        $tags = $this->getTags();

        $templateName = '/admin/tags';

        return $this->render($templateName . '.html.twig', $tags);
    }

    private function getNurls()
    {
        $em = $this->getDoctrine()->getManager();

        $nurls = $em->getRepository('AppBundle:Nurl')->findAll();

        return array(
            'nurls' => $nurls
        );
    }

    private function getTags()
    {
        $em = $this->getDoctrine()->getManager();

        $tags = $em->getRepository('AppBundle:Tag')->findAll();

        return array(
            'tags' => $tags
        );
    }
}