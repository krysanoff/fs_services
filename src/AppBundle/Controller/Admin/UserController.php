<?php
/**
 * @license MIT
 */
namespace AppBundle\Controller\Admin;

use AppBundle\AppBundle;
use AppBundle\Entity\User;
use AppBundle\Form\UserCreateFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Doctrine\ORM\EntityManager;
use AppBundle\Form\UserFormType;
use Twig\Tests\EnvironmentTest\Extension;

/**
 * Admin page controller
 */

class UserController extends Controller
{
    /**
     * @Route("/admin/users", name="admin_users_page")
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
     * @Route("/admin/user/{user}", name="admin_user", requirements={"user": "\d+"})
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
     * @Route("/admin/user/new", name="admin_user_add")
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
     * @Route("/admin/delete/user/{user}", name="admin_user_delete", requirements={"user": "\d+"})
     *
     * @return string
     */
    public function deleteAction($user)
    {
        if (!$user) {
            throw new NotFoundHttpException("Page not found");
        }

        $em = $this->getDoctrine();
        $deletingUser = $em->getRepository('AppBundle:User')->find($user);

        if (!$deletingUser) {
            throw new NotFoundHttpException("Page not found");
        }

        $em->getEntityManager()->remove($deletingUser);
        $em->getManager()->flush();

        $this->addFlash('success', 'User deleted');

        return $this->redirectToRoute('admin_users_page');
    }

    /**
     * @param Request $request
     *
     * @Route("/update/user", name="update_user")
     *
     * @Method("POST")
     *
     * @return string
     */
    public function updateAction(Request $request)
    {
        $form = $this->createForm(UserFormType::class, null, [
            'action' => $this->generateUrl('update_user'),
        ]);

        $form->handleRequest($request);

        if (!$form->isSubmitted() ||  !$form->isValid()) {
            $this->addFlash('error', 'There are some errors');
            return $this->redirect($request->headers->get('referer'));
        }

        $formData = $form->getData();
        dump($formData);

        $em = $this->getDoctrine()->getManager();

        $user = $em->find(User::class, $formData['user_id']);
        $user->setUsername($formData['username']);
        $user->setPassword($formData['password']);

        $em->persist($user);
        $em->flush();

        $this->addFlash('success', 'User\'s data has successfully updated');

        return $this->redirectToRoute('admin_users_page');
    }

    /**
     * @param Request $request
     *
     * @Route("/update/user/create", name="admin_user_create")
     *
     * @Method("POST")
     *
     * @return string
     */
    public function createAction(Request $request)
    {
        $form = $this->createForm(UserCreateFormType::class, null, [
            'action' => $this->generateUrl('admin_user_create'),
        ]);

        $form->handleRequest($request);

        if (!$form->isSubmitted() ||  !$form->isValid()) {
            $this->addFlash('error', 'There are some errors');
            return $this->redirect($request->headers->get('referer'));
        }

        $formData = $form->getNormData();
        dump($formData);

        $em = $this->getDoctrine()->getManager();

        $user = new User();
        $user->setUsername($formData['username']);
        $user->setPassword($formData['password']);
        $user->setRole($formData['role_id']);

        $em->persist($user);
        $em->flush();

        $this->addFlash('success', 'User\'s data has successfully created');

        return $this->redirectToRoute('admin_users_page');
    }
}