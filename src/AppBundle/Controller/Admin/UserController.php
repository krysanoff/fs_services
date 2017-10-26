<?php
/**
 * @license MIT
 */
namespace AppBundle\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Doctrine\ORM\EntityManager;
use AppBundle\Form\LoginFormType;
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

        return $this->render('admin/user.html.twig', [
            'user' => $editingUser,
        ]);
    }

    /**
     * @Route("/admin/user/", name="admin_user_create")
     *
     * @Method("POST")
     *
     * @return string
     */
    public function createAction()
    {

        return $this->render('admin/user.html.twig', [
            'user' => $user,
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

        return $this->redirectToRoute('admin_users_page', [
            'flash' => 'Пользователь удален',
        ]);
    }
}
