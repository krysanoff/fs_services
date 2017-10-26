<?php
/**
 * @license MIT
 */
namespace AppBundle\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\LoginFormType;

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
        return $this->render('admin/users.html.twig');
    }

    /**
     * @Route("/admin/user/{$user}", name="admin_user")
     *
     * @return string
     */
    public function getAction()
    {
        return $this->render('admin/user.html.twig');
    }
}
