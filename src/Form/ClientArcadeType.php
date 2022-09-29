<?php

namespace App\Form;

use App\Entity\ClientArcade;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientArcadeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Nazwa_klienta')
            ->add('Data')
            ->add('Godzina')
            ->add('Rezerwacja')
            ->add('Rodzaj_automatu_do_gry')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ClientArcade::class,
        ]);
    }
}
