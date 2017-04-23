<?php
/**
 * Created by PhpStorm.
 * User: Edward
 * Date: 22/04/2017
 * Time: 21:05
 */

namespace AppBundle\Controller;

use AppBundle\Form\LoginForm;
use AppBundle\Entity\User;
use AppBundle\Form\RegistrationForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\MimeType\FileinfoMimeTypeGuesser;
use Symfony\Component\HttpFoundation\File\MimeType\MimeTypeGuesser;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;



class RegistrationController extends Controller
{
    /**
     * @Route("/register", name="user_registration")
     */
    public function registrationAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(RegistrationForm::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $password = $this->get('security.password_encoder')->encodePassword($user, $user->getPlainPassword());

            $user->setPassword($password);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->render('security/register.html.twig', array(
            'form' => $form->createView()
        ));

    }
}