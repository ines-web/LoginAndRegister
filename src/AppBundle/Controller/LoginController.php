<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends Controller
{
    /**
     * @Route("/login" ,name="login")
     */
    public function loginAction(Request $request , AuthenticationUtils $authenticationUtils)
    {
        $errors=$authenticationUtils->getLastAuthenticationError();
        $lastUsername=$authenticationUtils->getLastUsername();
   
            
        return $this->render('@App/Login/login.html.twig', array(
            'username'=>$lastUsername,
            'errors'=>$errors,
            ));
    }

     /**
     * @Route("/logout" ,name="logout")
     */
    public function logoutAction() {
      
        

    }

}
