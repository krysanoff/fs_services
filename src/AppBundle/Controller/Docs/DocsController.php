<?php

namespace AppBundle\Controller\Docs;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DocsController extends Controller
{
    /**
     * @Route("/docs", name="Documents page")
     */
    public function indexAction(Request $request)
    {
        return $this->render('docs/index.html.twig', []);
    }
}