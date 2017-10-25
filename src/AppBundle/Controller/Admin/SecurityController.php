<?php
/**
 * @license MIT
 */
namespace AppBundle\Controller\Admin;

use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use AppBundle\Form\LoginFormType;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Class SecurityController
 */
class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function loginAction(AuthenticationUtils $helper)
    {
        return $this->render('admin/login.html.twig', array(
            // last username entered by the user (if any)
            'last_username' => $helper->getLastUsername(),
            // last authentication error (if any)
            'error' => $helper->getLastAuthenticationError(),
        ));
    }

    /**
     * This is the route the user can use to logout.
     *
     * But, this will never be executed. Symfony will intercept this first
     * and handle the logout automatically. See logout in app/config/security.yml
     *
     * @Route("/logout", name="logout")
     */
    public function logoutAction(): void
    {
        throw new \Exception('This should never be reached!');
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
