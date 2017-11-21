<?php
/**
 * @license MIT
 */
namespace AppBundle\Controller\Admin;

use AppBundle\Entity\Employee;
//use AppBundle\Service\FileUploader;
use AppBundle\Form\EmployeeFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Admin page controller
 */

class EmployeeController extends Controller
{
    /**
     * @Route("/{_locale}/admin/employees/", name="admin_employees_page")
     *
     * @return string
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()
            ->getRepository('AppBundle:Employee');
        $employees = $em->findAll();

        return $this->render('admin/employees.html.twig', [
            'employees' => $employees,
        ]);
    }

    /**
     * @Route("/{_locale}/admin/employee/{employee}", name="admin_employee", requirements={"employee": "\d+"})
     *
     * @return string
     */
    public function editAction($employee)
    {
        $em = $this->getDoctrine()
            ->getRepository('AppBundle:Employee');
        $editingEmployee = $em->find($employee);

        $form = $this->createForm(EmployeeFormType::class, $editingEmployee, [
            'action' => $this->generateUrl('update_employee', [
                'employee' => $editingEmployee,
            ]),
        ]);

        return $this->render('admin/employee.html.twig', [
            'employee' => $editingEmployee,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{_locale}/admin/employee/new", name="admin_employee_new")
     *
     * @return string
     */
    public function addAction()
    {
        $form = $this->createForm(EmployeeFormType::class, null, [
            'action' => $this->generateUrl('admin_employee_create'),
        ]);

        return $this->render('admin/new_employee.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/delete/employee/{employee}", name="admin_employee_delete", requirements={"employee": "\d+"})
     *
     * @return string
     */
    public function deleteAction($employee)
    {
        if (!$employee) {
            throw new NotFoundHttpException("Page not found");
        }

        $em = $this->getDoctrine();
        $deletingEmployee = $em->getRepository('AppBundle:Employee')->find($employee);

        if (!$deletingEmployee) {
            throw new NotFoundHttpException("Page not found");
        }

        $em->getManager()->remove($deletingEmployee);
        $em->getManager()->flush();

        $this->addFlash('success', $this->get('translator')->trans(
            'employee.flash.delete',
            array('%username%' => $deletingEmployee->getUsername()),
            'admin'));

        return $this->redirectToRoute('admin_employees_page');
    }

    /**
     * @param Request $request
     *
     * @Route("/update/employee", name="update_employee")
     *
     * @Method("POST")
     *
     * @return string
     */
    public function updateAction(Request $request)
    {
        $form = $this->createForm(EmployeeFormType::class, null, [
            'action' => $this->generateUrl('update_employee'),
        ]);

        $form->handleRequest($request);

        if (!$form->isSubmitted() ||  !$form->isValid()) {
            $this->addFlash('error', 'There are some errors');
            return $this->redirect($request->headers->get('referer'));
        }

        $formData = $form->getData();
        dump($formData);

        $em = $this->getDoctrine()->getManager();

        $employee = $em->find(Employee::class, $formData->getId());
        $employee->setLastname($formData->getLastname());
        $employee->setFirstname($formData->getFirstname());
        $employee->setMiddlename($formData->getMiddlename());
        $employee->setPosition($formData->getPosition());
        $employee->setRank($formData->getRank());
        $employee->setShift($formData->getShift());

        $em->persist($employee);
        $em->flush();

        $this->addFlash('success', 'Employee\'s data has successfully updated');

        return $this->redirectToRoute('admin_employees_page');
    }

    /**
     * @param Request $request
     *
     * @Route("/update/employee/create", name="admin_employee_create")
     *
     * @Method("POST")
     *
     * @return string
     */
    public function createAction(Request $request)
    {
        $form = $this->createForm(EmployeeFormType::class, null, [
            'action' => $this->generateUrl('admin_employee_create'),
        ]);

        $form->handleRequest($request);

        if (!$form->isSubmitted() ||  !$form->isValid()) {
            $this->addFlash('error', 'There are some errors');
            return $this->redirect($request->headers->get('referer'));
        }

        $formData = $form->getData();

        $em = $this->getDoctrine()->getManager();
        dump($formData);
        $employee = new Employee();
        $employee->setLastname($formData->getLastname());
        $employee->setFirstname($formData->getFirstname());
        $employee->setMiddlename($formData->getMiddlename());
        $employee->setPosition($formData->getPosition());
        $employee->setRank($formData->getRank());
        $employee->setShift($formData->getShift());

        //$imageName = $fileUploader->upload($formData->getImage());
        //$employee->setImage($imageName);

        $em->persist($employee);
        $em->flush();

        $this->addFlash('success', 'New employee has successfully created');

        return $this->redirectToRoute('admin_employees_page');
    }
}
