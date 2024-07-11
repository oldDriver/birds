<?php

namespace App\Form;

use App\Entity\Bird;
use App\Entity\Make;
use App\Entity\Model;
use App\Entity\Place;
use App\Entity\Status;
use App\Entity\Team;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BirdType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('serialNumber')
            ->add('tailNumber')
            ->add('description')
            ->add('createdAt', null, [
                'widget' => 'single_text',
            ])
            ->add('updatedAt', null, [
                'widget' => 'single_text',
            ])
            ->add('make', EntityType::class, [
                'class' => Make::class,
'choice_label' => 'id',
            ])
            ->add('model', EntityType::class, [
                'class' => Model::class,
'choice_label' => 'id',
            ])
            ->add('status', EntityType::class, [
                'class' => Status::class,
'choice_label' => 'id',
            ])
            ->add('team', EntityType::class, [
                'class' => Team::class,
'choice_label' => 'id',
            ])
            ->add('place', EntityType::class, [
                'class' => Place::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Bird::class,
        ]);
    }
}
