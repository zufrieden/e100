<?php

namespace E100\CoreBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        // add your custom field
        $builder->add('language', 'choice', array(
            'choices' => array(
                'fr' => 'French',
                'en' => 'English',
                'de' => 'Deutsch',
            )
        ));
    }

    public function getName()
    {
        return 'e100_user_registration';
    }
}
