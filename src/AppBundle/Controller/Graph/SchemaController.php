<?php
/**
 * @license MIT
 */
namespace AppBundle\Controller\Graph;

use AppBundle\Form\SchemaFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
*
*/
class SchemaController extends Controller
{
    /**
    * @Route("/{_locale}/admin/schemas", name="schemas")
    */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getRepository('AppBundle:GraphSchema');
        $schemas = $em->findAll();

        $create_form = $this->createForm(SchemaFormType::class, null, [
            'action' => $this->generateUrl('schema_create'),
        ]);

        return $this->render("/admin/schema.html.twig", [
            'schemas' => $schemas,
            'create_form' => $create_form->createView(),
        ]);
    }

    /**
     * Create a new schema
     *
     * @Route("/{_locale}/admin/schema/create", name="schema_create")
     *
     * @return string
     */
    public function createAction()
    {
        return 't';
    }
}