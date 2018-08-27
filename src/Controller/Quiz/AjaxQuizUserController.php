<?php
/**
 * Created by PhpStorm.
 * User: Herman
 * Date: 24.08.2018
 * Time: 21:06
 */
declare(strict_types=1);
namespace App\Controller\Quiz;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AjaxQuizUserController extends Controller
{
    /*/{quiz_id}/{user_id}/{score}", name="ajax", requirements={"quiz_id"="\d+", "user_id"="\d+", "score"="\d+"}*/
    /**
     * @Route("/ajax", name="ajax")
     */
    public function AjaxAction(Request $request)
    {

        if ($request->isXMLHttpRequest()) {
            $entityManager = $this->getDoctrine()->getManager();

            $user_id = $request->request->get('user_id');
            $user = $entityManager->getRepository('App:User')->find($user_id);

            $quiz_id = $request->request->get('quiz_id');
            $quiz = $entityManager->getRepository('App:Interview')->find($quiz_id);
            if ($user->getQuizzesCompleted()->contains($quiz)) {
                $entityManager->flush();
                return new Response('already completed!', 200);
            } else {

                $quiz_score = $request->request->get('score');


                $user->addQuizzesCompleted($quiz);
                $user->updateScore($quiz_score);
                $entityManager->flush();
                return new Response('okay', 200);
            }
        } else {
            return new Response('This is not ajax!', 400);
        }


    }

}