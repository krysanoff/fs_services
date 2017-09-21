<?php

namespace AppBundle\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AdminController extends Controller
{
    /**
     * @Route("/admin", name="Admin page")
     */
    public function indexAction(Request $request)
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            $authForm = $this->authFormAction();

            return $this->render('admin/login.html.twig', array(
                'authForm' => $authForm->createView(),
                ));
        }

        return $this->render('admin/index.html.twig', array());
    }

    public function authFormAction()
    {
        $authForm = $this->createFormBuilder()
            ->add('login', TextType::class)
            ->add('password', PasswordType::class)
            ->add('submit', SubmitType::class)
            ->getForm();

        return $authForm;
    }
}
