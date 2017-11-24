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
class SchemaController extends Controller
{
    /**
    * @Route("/{_locale}/admin/schema", name="schema")
    */
    public function indexAction()
    {
        return $this->render("graph/schema.html.twig");
    }
}