<?php
/**
 * Created by PhpStorm.
 * User: Herman
 * Date: 17.08.2018
 * Time: 11:50
 */
declare(strict_types=1);
namespace App\Controller\Users;


use App\Form\Users\JoinType;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class JoinController extends Controller
{
    /**
     * @Route("/join", name="join")
     */
    public function join(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {

        $user = new User();
        $form = $this->createForm(JoinType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('home');
        }
        return $this->render(
            'users/join.html.twig',
            array('form' => $form->createView())
        );
    }

    /**
     * @Route("/join-complete", name="join-complete")
     */
    public function join_complete()
    {
        return $this->render('users/join-complete.html.twig');
    }
}