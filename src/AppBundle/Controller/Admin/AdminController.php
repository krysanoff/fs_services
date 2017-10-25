<?php
/**
 * @license MIT
 */
namespace AppBundle\Controller\Admin;

use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use AppBundle\Form\LoginFormType;

/**
 * Admin page controller
 */

class AdminController extends Controller
{
    /**
     * @Route("/admin", name="Admin page")
     *
     * @return string
     */
    public function indexAction()
    {
        $user = $this->getUser();
        dump($this->getUser());

        if (!$user) {
            $authForm = $this->createForm(LoginFormType::class, null, [
                'action' => $this->generateUrl('handle_form_submission'),
            ]);

            return $this->render('admin/login.html.twig', array(
                'authForm' => $authForm->createView(),
            ));
        }

        return $this->render('admin/index.html.twig');
    }

    /**
     * @param Request $request
     *
     * @Route("/form-submission", name="handle_form_submission")
     *
     * @Method("POST")
     *
     * @return RedirectResponse
     */
    public function handleFormSubmissionAction(Request $request)
    {
        $authForm = $this->createForm(LoginFormType::class, null, [
            'action' => $this->generateUrl('handle_form_submission'),
        ]);

        $authForm->handleRequest($request);

        if (!$authForm->isSubmitted() ||  !$authForm->isValid()) {
            return $this->redirectToRoute('Admin page');
        }

        $formData = $authForm->getData();
        dump($formData);

        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->findOneBy([
                'login' => $formData['login'],
            ]);

        dump($user);

        if ($user || $user->getPassword() === $formData['password']) {
            dump('okey');
        }

        $this->addFlash('success', implode("\n", $formData));

        return $this->redirectToRoute('Admin page');
    }
}
