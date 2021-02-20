<?php

namespace App\Form;

use App\Entity\VariousFile;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class VariousFilesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('file', VichFileType::class, [
            'required' => false,
            'allow_delete' => true,
            'asset_helper' => true,
            'label' => false
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => VariousFile::class,
        ]);
    }
}
