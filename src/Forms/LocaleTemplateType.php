<?php

namespace App\Form;

use App\Entity\LocaleTemplates;
use App\Form\VariousFilesType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\LanguageType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class LocaleTemplateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Name')
            ->add('Locale', LanguageType::class, [
                'preferred_choices' => ['nl', 'de', 'fr'],
                'empty_data' => 'nl'
            ])
            ->add('Workflow', ChoiceType::class, [
                'choices' => [
                    0,
                    1,
                    2
                ]
            ])
            ->add('DocumentStyle', ChoiceType::class, [
                'choices' => [
                    0,
                    1,
                    2
                ]
            ])
            ->add('QuoteEmail', EmailTemplateType::class, [
            ])
            ->add('NoQuoteEmail', EmailTemplateType::class, [
            ])
            ->add('HeaderImage', VariousFilesType::class)
            ->add('FooterImage', VariousFilesType::class)
            ->add('Brochure', VariousFilesType::class)
            ->add('Save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => LocaleTemplates::class,
        ]);
    }
}
