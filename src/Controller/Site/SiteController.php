<?php
/**
 * Created by PhpStorm.
 * User: Herman
 * Date: 17.08.2018
 * Time: 11:48
 */
declare(strict_types=1);
namespace App\Controller\Site;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class SiteController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function homepage()
    {
        return $this->render('site/home.html.twig');
    }

    /**
     * @Route("/about", name="about")
     */
    public function about()
    {
        return $this->render('site/about.html.twig');
    }


}