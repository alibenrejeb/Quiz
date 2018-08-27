<?php
/**
 * Created by PhpStorm.
 * User: Herman
 * Date: 25.08.2018
 * Time: 17:27
 */
declare(strict_types=1);
namespace App\Form\Quiz;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;

class AnswerCollectionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('answers', CollectionType::class, array(
            'entry_type' => AnswerType::class,
            'entry_options' => array('label' => false),
           'allow_add' => true,
            'allow_delete' => true,
            'prototype' => true,
            'attr' => array(
                'class' => 'qweqweqwe',
            ),
        ));
    }
}