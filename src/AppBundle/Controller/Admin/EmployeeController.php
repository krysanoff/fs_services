<?php
/**
 * @license MIT
 */
namespace AppBundle\Controller\Admin;

use AppBundle\Entity\Employee;
use AppBundle\Form\EmployeeCreateFormType;
//use AppBundle\Service\FileUploader;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use AppBundle\Form\UserFormType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Admin page controller
 */

class EmployeeController extends Controller
{
    /**
     * @Route("/admin/employees", name="admin_employees_page")
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
     * @Route("/admin/user/{user}", name="admin_user", requirements={"user": "\d+"})
     *
     * @return string
     */
    public function editAction($user)
    {
        $em = $this->getDoctrine()
            ->getRepository('AppBundle:User');
        $editingUser = $em->find($user);

        $form = $this->createForm(UserFormType::class, null, [
            'action' => $this->generateUrl('update_user', [
                'user' => $user,
            ]),
        ]);

        return $this->render('admin/user.html.twig', [
            'user' => $editingUser,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/employee/new", name="admin_employee_new")
     *
     * @return string
     */
    public function addAction()
    {
        $form = $this->createForm(EmployeeCreateFormType::class, null, [
            'action' => $this->generateUrl('admin_employee_create'),
        ]);

        return $this->render('admin/new_employee.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/delete/user/{user}", name="admin_user_delete", requirements={"user": "\d+"})
     *
     * @return string
     */
    public function deleteAction($user)
    {
        if (!$user) {
            throw new NotFoundHttpException("Page not found");
        }

        $em = $this->getDoctrine();
        $deletingUser = $em->getRepository('AppBundle:User')->find($user);

        if (!$deletingUser) {
            throw new NotFoundHttpException("Page not found");
        }

        $em->getEntityManager()->remove($deletingUser);
        $em->getManager()->flush();

        $this->addFlash('success', 'User deleted');

        return $this->redirectToRoute('admin_users_page');
    }

    /**
     * @param Request $request
     *
     * @Route("/update/user", name="update_user")
     *
     * @Method("POST")
     *
     * @return string
     */
    public function updateAction(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $form = $this->createForm(UserFormType::class, null, [
            'action' => $this->generateUrl('update_user'),
        ]);

        $form->handleRequest($request);

        if (!$form->isSubmitted() ||  !$form->isValid()) {
            $this->addFlash('error', 'There are some errors');
            return $this->redirect($request->headers->get('referer'));
        }

        $formData = $form->getData();

        $em = $this->getDoctrine()->getManager();

        $user = $em->find(User::class, $formData['user_id']);
        $user->setUsername($formData['username']);
        $user->setPassword($encoder->encodePassword($user, $formData['password']));

        $em->persist($user);
        $em->flush();

        $this->addFlash('success', 'User\'s data has successfully updated');

        return $this->redirectToRoute('admin_users_page');
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
        $form = $this->createForm(EmployeeCreateFormType::class, null, [
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
