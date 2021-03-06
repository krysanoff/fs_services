<?php
/**
 * @license MIT
 */
namespace AppBundle\Controller\Admin;

use AppBundle\Entity\User;
use AppBundle\Form\UserCreateFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use AppBundle\Form\UserFormType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Admin page controller
 */

class UserController extends Controller
{
    /**
     * @Route("/{_locale}/admin/users", name="admin_users_page")
     *
     * @return string
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()
            ->getRepository('AppBundle:User');
        $users = $em->findAll();

        return $this->render('admin/users.html.twig', [
            'users' => $users,
        ]);
    }

    /**
     * @Route("/{_locale}/admin/user/{user}", name="admin_user", requirements={"user": "\d+"})
     *
     * @param int $user
     *
     * @return string
     */
    public function editAction($user)
    {
        $em = $this->getDoctrine()
            ->getRepository('AppBundle:User');
        $editingUser = $em->find($user);

        $form = $this->createForm(UserFormType::class, null, [
            'action' => $this->generateUrl('update_user', [
                'user' => $user,
            ]),
        ]);

        return $this->render('admin/user.html.twig', [
            'user' => $editingUser,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{_locale}/admin/user/new", name="admin_user_add")
     *
     * @return string
     */
    public function addAction()
    {
        $form = $this->createForm(UserCreateFormType::class, null, [
            'action' => $this->generateUrl('admin_user_create'),
        ]);

        return $this->render('admin/new_user.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{_locale}/admin/delete/user/{user}", name="admin_user_delete", requirements={"user": "\d+"})
     *
     * @param int $user
     *
     * @return string
     */
    public function deleteAction($user)
    {
        $em = $this->getDoctrine();
        $deletingUser = $em->getRepository('AppBundle:User')->find($user);

        if (!$deletingUser || !$user) {
            throw new NotFoundHttpException("Deleting user doesn't exist");
        }

        $em->getManager()->remove($deletingUser);
        $em->getManager()->flush();

        $this->addFlash('success', $this->get('translator')->trans(
            'user.flash.delete',
            array('%username%' => $deletingUser->getUsername()),
            'admin')
        );

        return $this->redirectToRoute('admin_users_page');
    }

    /**
     * @param Request                      $request
     * @param UserPasswordEncoderInterface $encoder
     *
     * @Route("/{_locale}/update/user", name="update_user")
     *
     * @Method("POST")
     *
     * @return string
     */
    public function updateAction(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $form = $this->createForm(UserFormType::class, null, [
            'action' => $this->generateUrl('update_user'),
        ]);

        $form->handleRequest($request);

        if (!$form->isSubmitted() ||  !$form->isValid()) {
            foreach ($form->getErrors(true) as $error) {
                $this->addFlash('danger', $error->getMessage());
            }

            $em = $this->getDoctrine()
                ->getRepository('AppBundle:User');
            $editingUser = $em->find($request->query->get('user'));

            return $this->redirectToRoute('admin_user', array(
                'user' => $editingUser->getId(),
            ));
        }

        $formData = $form->getData();

        $em = $this->getDoctrine()->getManager();

        $user = $em->find(User::class, $formData['user_id']);
        $user->setUsername($formData['username']);
        $user->setPassword($encoder->encodePassword($user, $formData['password']));

        $em->persist($user);
        $em->flush();

        $this->addFlash('success', $this->get('translator')->trans(
            'user.flash.update',
            array('%username%' => $user->getUsername()),
            'admin')
        );

        return $this->redirectToRoute('admin_users_page');
    }

    /**
     * @param Request                      $request
     * @param UserPasswordEncoderInterface $encoder
     *
     * @Route("/{_locale}/user/create", name="admin_user_create")
     *
     * @Method("POST")
     *
     * @return string
     */
    public function createAction(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $form = $this->createForm(UserCreateFormType::class, null, [
            'action' => $this->generateUrl('admin_user_create'),
        ]);

        $form->handleRequest($request);

        if (!$form->isSubmitted() ||  !$form->isValid()) {
            foreach ($form->getErrors(true) as $error) {
                $this->addFlash('danger', $error->getMessage());
            }

            return $this->redirect($request->headers->get('referer'));
        }

        $formData = $form->getData();

        $em = $this->getDoctrine()->getManager();

        $user = new User();
        $user->setUsername($formData['username']);
        $user->setPassword($encoder->encodePassword($user, $formData['password']));
        $user->setRole($formData['role_id']);

        $em->persist($user);
        $em->flush();

        $this->addFlash('success', $this->get('translator')->trans(
            'user.flash.create',
            array('%username%' => $user->getUsername()),
            'admin')
        );

        return $this->redirectToRoute('admin_users_page');
    }
}
