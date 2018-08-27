<?php
/**
 * Created by PhpStorm.
 * User: Herman
 * Date: 17.08.2018
 * Time: 11:54
 */
declare(strict_types=1);
namespace App\Controller\Quiz;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class ListController extends Controller
{
    /**
     * @Route("/{slug}", name="category", requirements={"slug"="all|new|popular"})
     */
    public function list_page()
    {
        $quiz_list=$this->getDoctrine()->getManager()->getRepository('App:Interview')->findAll();

        return $this->render('quiz/list.html.twig', array("quiz_list"=>$quiz_list));
    }
}