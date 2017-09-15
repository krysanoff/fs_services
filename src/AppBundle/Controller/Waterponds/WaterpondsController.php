<?php
namespace AppBundle\Controller\Waterponds;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
* 
*/
class WaterpondsController extends Controller
{
    /**
    * @Route("/waterponds", name="Waterponds page")
    */
    public function waterpondsAction()
    {
        return $this->render("waterponds/index.html.twig");
    }

    /**
    * @Route("/waterponds/quiz", name="Quiz")
    */
    public function waterpondsQuizAction()
    {
        return $this->render("waterponds/quiz.html.twig");
    }
}