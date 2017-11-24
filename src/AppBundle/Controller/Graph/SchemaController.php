<?php
/**
 * @license MIT
 */
namespace AppBundle\Controller\Graph;

use AppBundle\Entity\GraphSchema;
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
    public function createAction(Request $request)
    {
        $form = $this->createForm(SchemaFormType::class, null, [
            'action' => $this->generateUrl('schema_create'),
        ]);

        $form->handleRequest($request);

        if (!$form->isValid() || !$form->isSubmitted()) {
            foreach ($form->getErrors(true) as $error)
            {
                $this->addFlash('danger', $error->getMessage());
            }

            return $this->redirect($request->headers->get('referer'));
        }

        $formData = $form->getData();
        dump($formData);

        $em = $this->getDoctrine()->getManager();
        $schema = new GraphSchema();
        $schema->setName($formData->getName());

        $em->persist($schema);
        $em->flush();

        $this->addFlash('success', $this->get('translator')->trans(
            'employee.flash.create',
            ['%employee%' => $schema->getName()],
            'admin'
        ));

        return $this->redirectToRoute('schemas');

    }

    /**
     * Update a schema
     *
     * @Route("/{_locale}/admin/schema/update", name="schema_update")
     *
     * @return string
     */
    public function updateAction()
    {
        return 't';
    }

    /**
     * Delete a schema
     *
     * @Route("/{_locale}/admin/schema/delete", name="schema_delete")
     *
     * @return string
     */
    public function deleteAction()
    {
        return 't';
    }
}