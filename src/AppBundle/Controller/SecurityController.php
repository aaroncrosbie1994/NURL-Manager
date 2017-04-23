<?php
/**
 * Created by PhpStorm.
 * User: Edward
 * Date: 22/04/2017
 * Time: 20:21
 */

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\LoginForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="security_login")
     */
    public function loginAction()
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        $form = $this->createForm(LoginForm::class);

        return $this->render('security/login.html.twig', array(
            'form' => $form->createView(),
            'error'         => $error,
        ));
    }

    public function newAction(Request $request)
    {
        $user = new User();

        $form = $this->createFormBuilder($user);
    }
}