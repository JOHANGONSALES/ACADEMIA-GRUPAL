<?php

namespace App\Form;

use App\Entity\Cursos;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
//use Symfony\Component\Form\Extension\Core\Type\EntityType;
//use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class CursosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('estado')
            ->add('titulo', TextType::class, array(
                'label' => "Titulo",
                'required' => true,
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Titulo del curso'
                )
            ))
            ->add('descripcion', TextareaType::class, array(
                'label' => "Descripción",
                'required' => true,
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Pon aquí la descripción del curso'
                )
            ))
            ->add('new')

            ->add('tipo', TextType::class, array(
                'label' => "Seleccionar tipo de curso",
                'required' => true,
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Tipo de curso'
                )
            ))

            ->add('imageFile', FileType::class, [
                'label' => 'Imagen',
                'required' => false,
                // unmapped means that this field is not associated to any entity property
                'mapped' => false,


            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cursos::class,
        ]);
    }
}
