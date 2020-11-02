<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Routing\Annotation\Route;

class RegisterController extends AbstractController
{
    /**
     * @Route("/register", name="register")
     */
    public function register()
    {
        $form = $this->createFormBuilder()
        ->add('username')
        ->add('password', RepeatedType::class, [
            'type' => PasswordType::class,
            'required' => true,
            'first_options' => ['label' => 'Password'],
            'second_options' => ['label' => 'Confirm Password']
        ])
        ->getForm();
        ;



        return $this->render('register/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
