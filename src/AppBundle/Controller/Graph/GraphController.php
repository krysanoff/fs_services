<?php
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
    * @Route("/graph", name="Graph page")
    */
    public function graphAction()
    {
        return $this->render("graph/index.html.twig");
    }
}