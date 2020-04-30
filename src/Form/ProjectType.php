<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Project;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Title')
            ->add('Goal', MoneyType::class, [
                'required' => true,
            ])
            ->add('LimitDate', DateType::class, [
                'widget' => 'choice',
                'years' => range(date('Y'), date('Y') + 10),
                'months' => range(0, 12),
                'days' => range(0, 31),
                'required' => true,
            ])
            ->add('Description', CKEditorType::class, [
                'required' => true,
            ])
            ->add('Miniature', TextType::class, [
                'required' => true
            ])
            ->add('categories', EntityType::class, ['class' => Category::class, 'multiple' => true,
                'expanded' => true,]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
