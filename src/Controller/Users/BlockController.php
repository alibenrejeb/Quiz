<?php
/**
 * Created by PhpStorm.
 * User: Herman
 * Date: 27.08.2018
 * Time: 11:23
 */
declare(strict_types=1);
namespace App\Controller\Users;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class BlockController extends Controller
{
    /**
     * @Route("/blocked", name="blocked")
     */
    public function blocked_page()
    {
        $message = "You was blocked, reason:";
        return $this->render('users/blocked.html.twig',
            array('message' => $message)
        );
    }

}