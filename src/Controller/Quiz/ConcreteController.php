<?php
/**
 * Created by PhpStorm.
 * User: Herman
 * Date: 17.08.2018
 * Time: 11:56
 */
declare(strict_types=1);
namespace App\Controller\Quiz;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ConcreteController extends Controller
{
    /**
     * @Route("/{id}", name="quiz", requirements={"id"="\d+"})
     */
    public function quiz($id, Request $request)
    {


        $quiz = $this->getDoctrine()->getManager()->getRepository('App:Interview')->find($id);
        $user = $this->getUser();
        if ($user->getQuizzesCompleted()->contains($quiz)) {
            $this->addFlash('danger', 'This game wont be scored because you played it before');
        }
        return $this->render('quiz/concrete.html.twig', array("quiz" => $quiz));
    }

}