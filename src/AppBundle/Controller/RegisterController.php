<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegisterController extends Controller
{
    /**
     * @Route("/register")
     * @param \Symfony\Component\HttpFoundation\Request $request
     */
    public function registerAction(Request $request, UserPasswordEncoderInterface $userPasswordEncoderInterface)
    {   
        $em=$this->getDoctrine()->getManager();
        $user=new User();
        $form=$this->createForm('AppBundle\Form\UserType',$user);
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid()){
            //Create the user
           // $em=$this->getDoctrine()->getManager();
           $user->setPassword($userPasswordEncoderInterface->encodePassword($user,$user->getPassword()));
           $em->persist($user);
           $em->flush();
           $this->addFlash('success','Vous êtes maintenant inscrit !');
           return $this->redirectToRoute('login');


        }
        return $this->render('AppBundle:Register:register.html.twig', array(
            'form'=>$form->createView()
            // ...
        ));
    }

}
