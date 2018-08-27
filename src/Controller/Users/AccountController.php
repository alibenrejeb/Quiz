<?php
/**
 * Created by PhpStorm.
 * User: Herman
 * Date: 17.08.2018
 * Time: 11:53
 */
declare(strict_types=1);
namespace App\Controller\Users;


use App\Form\Users\EditAccountType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AccountController extends Controller
{
    /**
     * @Route("/account", name="account")
     */
    public function account(Request $request)
    {

        $user = $this->getUser();

        $form = $this->createForm(EditAccountType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('success', 'Account updated!');
            return $this->redirectToRoute('account');
        }

        return $this->render('users/account.html.twig',
            array('form' => $form->createView())
        );
    }

}