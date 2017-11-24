<?php
/**
 * @license MIT
 */
namespace AppBundle\Controller\Graph;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
*
*/
class GraphController extends Controller
{
    /**
    * @Route("/{_locale/admin/graph", name="graph")
    */
    public function indexAction()
    {
        return $this->render("graph/index.html.twig");
    }
}