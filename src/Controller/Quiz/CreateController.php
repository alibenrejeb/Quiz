<?php
/**
 * Created by PhpStorm.
 * User: Herman
 * Date: 17.08.2018
 * Time: 11:57
 */
declare(strict_types=1);
namespace App\Controller\Quiz;


use App\Entity\Interview;
use App\Entity\Question;
use App\Form\Quiz\AnswerCollectionType;
use App\Form\Quiz\InterviewType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class CreateController extends Controller
{
    /**
     * @Route("/create", name="create_quiz")
     */
    public function create(Request $request)
    {
        $interview = new Interview();

        $Questionform = $this->createForm(InterviewType::class, $interview);
        $Questionform->handleRequest($request);

        $Answerform = $this->createForm(AnswerCollectionType::class, $interview);
        $Answerform->handleRequest($request);


        return $this->render('quiz/create.html.twig',
            array('questionform' => $Questionform->createView(),
                'answerform' => $Answerform->createView(),
            ));
    }
}