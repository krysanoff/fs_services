<?php
/**
 * @license MIT
 */
namespace AppBundle\Controller\Admin;

use AppBundle\Entity\Employee;
use AppBundle\Service\FileUploader;
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
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()
            ->getRepository('AppBundle:Employee');
        $employees = $em->findAll();

        $page = $request->query->get('page') ?? 1;

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $employees,
            $page
        );

        return $this->render('admin/employees.html.twig', [
            'employees' => $employees,
            'pagination' => $pagination,
        ]);
    }

    /**
     * @Route("/{_locale}/admin/employee/{employee}", name="admin_employee", requirements={"employee": "\d+"})
     *
     * @param int $employee
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
     * @Route("/{_locale}/admin/delete/employee/{employee}", name="admin_employee_delete", requirements={"employee": "\d+"})
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
            ['%employee%' => $deletingEmployee->getFullname()],
            'admin'));

        return $this->redirectToRoute('admin_employees_page');
    }

    /**
     * @param Request      $request
     * @param FileUploader $fileUploader
     *
     * @Route("/{_locale}/update/employee", name="update_employee")
     *
     * @Method("POST")
     *
     * @return string
     */
    public function updateAction(Request $request, FileUploader $fileUploader)
    {
        $form = $this->createForm(EmployeeFormType::class, null, [
            'action' => $this->generateUrl('update_employee'),
        ]);

        $form->handleRequest($request);

        if (!$form->isSubmitted() ||  !$form->isValid()) {
            foreach ($form->getErrors(true) as $error) {
                $this->addFlash('danger', $error->getMessage());
            }

            return $this->redirect($request->headers->get('referer'));
        }

        $formData = $form->getData();
        dump($formData);

        $em = $this->getDoctrine()->getManager();
        $imageName = $fileUploader->upload($formData->getImage());

        $employee = $em->find(Employee::class, $formData->getId());

        // ucfirst doesn't work with cyrillic in utf-8
        $employee->setLastname(mb_strtoupper(mb_substr($formData->getLastname(), 0, 1)).mb_substr($formData->getLastname(), 1));
        $employee->setFirstname(mb_strtoupper(mb_substr($formData->getFirstname(), 0, 1)).mb_substr($formData->getFirstname(), 1));
        $employee->setMiddlename(mb_strtoupper(mb_substr($formData->getMiddlename(), 0, 1)).mb_substr($formData->getMiddlename(), 1));

        $employee->setPosition($formData->getPosition());
        $employee->setRank($formData->getRank());
        $employee->setShift($formData->getShift());
        $employee->setImage($imageName);

        $em->persist($employee);
        $em->flush();

        $this->addFlash('success', $this->get('translator')->trans(
            'employee.flash.update',
            ['%employee%' => $employee->getFullname()],
            'admin')
        );

        return $this->redirectToRoute('admin_employees_page');
    }

    /**
     * @param Request $request
     * @param FileUploader $fileUploader
     *
     * @Route("/{_locale}/update/employee/create", name="admin_employee_create")
     *
     * @Method("POST")
     *
     * @return string
     */
    public function createAction(Request $request, FileUploader $fileUploader)
    {
        $form = $this->createForm(EmployeeFormType::class, null, [
            'action' => $this->generateUrl('admin_employee_create'),
        ]);

        $form->handleRequest($request);

        if (!$form->isSubmitted() ||  !$form->isValid()) {
            foreach ($form->getErrors(true) as $error)
            {
                $this->addFlash('danger', $error->getMessage());
            }

            return $this->redirect($request->headers->get('referer'));
        }

        $formData = $form->getData();

        $em = $this->getDoctrine()->getManager();
        $imageName = $fileUploader->upload($formData->getImage());

        $employee = new Employee();
        $employee->setLastname(mb_strtoupper(mb_substr($formData->getLastname(), 0, 1)).mb_substr($formData->getLastname(), 1));
        $employee->setFirstname(mb_strtoupper(mb_substr($formData->getFirstname(), 0, 1)).mb_substr($formData->getFirstname(), 1));
        $employee->setMiddlename(mb_strtoupper(mb_substr($formData->getMiddlename(), 0, 1)).mb_substr($formData->getMiddlename(), 1));
        $employee->setPosition($formData->getPosition());
        $employee->setRank($formData->getRank());
        $employee->setShift($formData->getShift());
        $employee->setImage($imageName);

        $em->persist($employee);
        $em->flush();

        $this->addFlash('success', $this->get('translator')->trans(
            'employee.flash.create',
            ['%employee%' => $employee->getFullname()],
            'admin'
        ));

        return $this->redirectToRoute('admin_employees_page');
    }
}
