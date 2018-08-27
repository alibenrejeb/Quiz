<?php
/**
 * Created by PhpStorm.
 * User: Herman
 * Date: 17.08.2018
 * Time: 11:25
 */
declare(strict_types=1);
namespace App\Form\Quiz;


use App\Entity\Question;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;



class QuestionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('question');

        /*$builder->add('answers', CollectionType::class, array(
            'entry_type' => AnswerType::class,
            'entry_options' => array('label' => false),
           'allow_add' => true,
            'allow_delete' => true,
            'prototype' => true,
            'attr' => array(
                'class' => 'qweqweqwe',
            ),
        ));*/
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Question::class,
        ));
    }

}