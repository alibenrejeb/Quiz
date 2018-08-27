<?php
/**
 * Created by PhpStorm.
 * User: Herman
 * Date: 27.08.2018
 * Time: 11:47
 */
declare(strict_types=1);
namespace App\Controller\Users;


use App\Form\Users\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
class ContactController extends Controller
{
    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request, \Swift_Mailer $mailer)
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $contactFormData = $form->getData();

            $message = (new \Swift_Message('You Got Mail!'))
                ->setFrom($contactFormData['email'])
                ->setTo('exmaple@email.como')
                ->setBody(
                    $contactFormData['message'],
                    'text/plain'
                );
            $mailer->send($message);

             $this->addFlash('success', 'It sent!');

            return $this->redirectToRoute('contact');
        }
        return $this->render('site/contact.html.twig',
            array('form' => $form->createView()
            ));
    }
}