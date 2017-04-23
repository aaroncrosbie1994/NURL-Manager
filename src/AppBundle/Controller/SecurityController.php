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
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class SecurityController extends Controller
{
//    /**
//     * @Route("/login", name="security_login")
//     */
//    public function loginAction(Request $request)
//    {
//        $authenticationUtils = $this->get('security.authentication_utils');
//
//        // get the login error if there is one
//        $error = $authenticationUtils->getLastAuthenticationError();
//
//        // last username entered by the user
//        $lastUsername = $authenticationUtils->getLastUsername();
//
//        $session = new Session();
//        $session->set('username', $lastUsername);
//
//        //$form = $this->createForm(LoginForm::class);
//
//        return $this->render('security/login.html.twig', array(
//            'last_username' => $lastUsername,
//            'error'         => $error,
//        ));
//    }

    /**
     * @Route("/login", name="security_login")
     */
    public function loginAction(Request $request)
    {
        $user = new User();
        $session = $this->get('session');
        //$session->start();
        $form = $this->createForm('AppBundle\Form\LoginForm');
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            if($this->canAuthenticate($user)){
                $session->set('user', $user);

                return $this->redirectToRoute('homepage');
            }else{
                $this->addFlash(
                    'error',
                    'bad username or password, please try again'
                );
                $user->setPassword('');
                $form = $this->createForm('AppBundle\Form\LoginForm', $user);
            }
        }

        $argsArray =[
            'user' => $user,
            'form' => $form->createView(),
        ];

        $templateName = 'security/login';

        return $this->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * @param User $user
     * @return bool
     */
    public function canAuthenticate(User $user)
    {
        $username = $user->getUsername();
        $password = $user->getPassword();
        return ('admin' == $username) && ('admin' == $password);
    }
}