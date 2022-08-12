<?php

namespace Nettivene\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class LuckyDrawFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('username', TextType::class, ['label' => 'username', 'required' => false]);
        $builder->add(
            'language',
            ChoiceType::class,
            [
                'expanded' => true,
                'multiple' => false,
                'choices' => ['english' => 'en', 'finnish' => 'fi'],
                'label' => 'Show languages',
            ]
        );
        $builder->add(
            'games',
            ChoiceType::class,
            [
                'expanded' => false,
                'multiple' => true,
                'choices' => ['gears of war' => 'gears_of_war', 'fear 3 3d' => 'fear_3_3d'],
                'label' => 'Games',
            ]
        );
        $builder->add(
            'achievements',
            ChoiceType::class,
            [
                'expanded' => true,
                'multiple' => true,
                'choices' => ['puny god' => 'puny_god', 'master mage' => 'master_mage'],
                'label' => 'Achievements',
            ]
        );
        $builder->add('submit', SubmitType::class, ['label' => 'submit']);
        $builder->setMethod('POST');
    }
}
