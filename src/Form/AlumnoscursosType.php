<?php

namespace App\Form;

use App\Entity\Alumnos;
use App\Entity\Cursos;
use App\Entity\Alumnoscursos;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;


class AlumnoscursosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fecha', DateType::class, [
                // renders it as a single text box
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control'],
                'label' => 'Indicar la fecha',
                'required'   => true,
            ])
            ->add('fk_alumno', EntityType::class, [
                'class' => Alumnos::class,
                'attr' => ['class' => 'form-control'],
                'label' => 'Seleccionar alumno',

            ])
            ->add('fk_curso', EntityType::class, [
                'class' => Cursos::class,
                'attr' => ['class' => 'form-control'],
                'label' => 'Seleccionar curso',

            ])


        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Alumnoscursos::class,
        ]);
    }
}
