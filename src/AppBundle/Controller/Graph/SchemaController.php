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
     *
     * @return string
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getRepository('AppBundle:GraphSchema');
        $schemas = $em->findAll();
        $forms = [];

        $createForm = $this->createForm(SchemaFormType::class, null, [
            'action' => $this->generateUrl('schema_create'),
        ]);

        foreach ($schemas as $schema) {
            $schema_form = $this->createForm(SchemaFormType::class, $schema, [
                'action' => $this->generateUrl('schema_update'),
            ]);

            $forms[] = $schema_form->createView();
        }

        return $this->render("/admin/schema.html.twig", [
            'create_form' => $createForm->createView(),
            'forms' => $forms,
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

        $em = $this->getDoctrine()->getManager();
        $schema = new GraphSchema();
        $schema->setName($formData['name']);

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
     * @param Request $request
     *
     * @return string
     */
    public function updateAction(Request $request)
    {
        $form = $this->createForm(SchemaFormType::class, null);

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
        $schema = $em->find(GraphSchema::class, $formData['id']);

        $schema->setName($formData['name']);

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
     * Delete a schema
     *
     * @Route("/{_locale}/admin/schema/delete/{schema}", name="schema_delete", requirements={"schema": "\d+"})
     *
     * @return string
     */
    public function deleteAction($schema)
    {
        if (!$schema) {
            throw new NotFoundHttpException("Page not found");
        }

        $em = $this->getDoctrine();
        $deletingSchema = $em->getRepository(GraphSchema::class)->find($schema);

        if (!$deletingSchema) {
            throw new NotFoundHttpException("Page not found");
        }

        $em->getManager()->remove($deletingSchema);
        $em->getManager()->flush();

        $this->addFlash('success', 'deleted');

        return $this->redirectToRoute('schemas');
    }
}