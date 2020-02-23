<?php

namespace App\Form;

use App\Entity\Project;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Objectif')
            ->add('LimitDate')
            ->add('Report')
            ->add('Up')
            ->add('down')
            ->add('Description')
            ->add('Minature')
            ->add('user')
            ->add('tags')
            ->add('Statu')
            ->add('categories');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
