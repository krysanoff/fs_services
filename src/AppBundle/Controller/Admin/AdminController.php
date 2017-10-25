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

class AdminController extends Controller
{
    /**
     * @Route("/admin", name="admin_page")
     *
     * @return string
     */
    public function indexAction()
    {
        return $this->render('admin/index.html.twig');
    }
}
