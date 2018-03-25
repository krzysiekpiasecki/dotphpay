<?php

declare(strict_types=1);

/*
 * This file is part of Dotpayds project.
 * (c) Krzysztof Piasecki <krzysiekpiasecki@gmail.com>
 *
 * @license   https://opensource.org/licenses/MIT  The MIT License
 */

namespace KrzysiekPiasecki\Dotpay\Request;

use KrzysiekPiasecki\Dotpay\Request\Validator\Constraint\Addr3Constraint;
use KrzysiekPiasecki\Dotpay\Request\Validator\Constraint\AmountConstraint;
use KrzysiekPiasecki\Dotpay\Request\Validator\Constraint\ApiVersionConstraint;
use KrzysiekPiasecki\Dotpay\Request\Validator\Constraint\BlikCodeConstraint;
use KrzysiekPiasecki\Dotpay\Request\Validator\Constraint\ButtontextConstraint;
use KrzysiekPiasecki\Dotpay\Request\Validator\Constraint\BylawConstraint;
use KrzysiekPiasecki\Dotpay\Request\Validator\Constraint\ChannelConstraint;
use KrzysiekPiasecki\Dotpay\Request\Validator\Constraint\ChannelGroupsConstraint;
use KrzysiekPiasecki\Dotpay\Request\Validator\Constraint\ChLockConstraint;
use KrzysiekPiasecki\Dotpay\Request\Validator\Constraint\CityConstraint;
use KrzysiekPiasecki\Dotpay\Request\Validator\Constraint\ControlConstraint;
use KrzysiekPiasecki\Dotpay\Request\Validator\Constraint\CountryConstraint;
use KrzysiekPiasecki\Dotpay\Request\Validator\Constraint\CurrencyConstraint;
use KrzysiekPiasecki\Dotpay\Request\Validator\Constraint\DeladdrConstraint;
use KrzysiekPiasecki\Dotpay\Request\Validator\Constraint\EmailConstraint;
use KrzysiekPiasecki\Dotpay\Request\Validator\Constraint\ExpirationDateConstraint;
use KrzysiekPiasecki\Dotpay\Request\Validator\Constraint\FirstnameConstraint;
use KrzysiekPiasecki\Dotpay\Request\Validator\Constraint\IdConstraint;
use KrzysiekPiasecki\Dotpay\Request\Validator\Constraint\LangConstraint;
use KrzysiekPiasecki\Dotpay\Request\Validator\Constraint\LastnameConstraint;
use KrzysiekPiasecki\Dotpay\Request\Validator\Constraint\PEmailConstraint;
use KrzysiekPiasecki\Dotpay\Request\Validator\Constraint\PersonalDataConstraint;
use KrzysiekPiasecki\Dotpay\Request\Validator\Constraint\PhoneConstraint;
use KrzysiekPiasecki\Dotpay\Request\Validator\Constraint\PInfoConstraint;
use KrzysiekPiasecki\Dotpay\Request\Validator\Constraint\PostcodeConstraint;
use KrzysiekPiasecki\Dotpay\Request\Validator\Constraint\StateConstraint;
use KrzysiekPiasecki\Dotpay\Request\Validator\Constraint\StreetConstraint;
use KrzysiekPiasecki\Dotpay\Request\Validator\Constraint\StreetN1Constraint;
use KrzysiekPiasecki\Dotpay\Request\Validator\Constraint\StreetN2Constraint;
use KrzysiekPiasecki\Dotpay\Request\Validator\Constraint\TypeConstraint;
use KrzysiekPiasecki\Dotpay\Request\Validator\Constraint\URLCConstraint;
use KrzysiekPiasecki\Dotpay\Request\Validator\Constraint\URLConstraint;
use KrzysiekPiasecki\Dotpay\Response\Validator\Constraint\DescriptionConstraint;
use Symfony\Component\Form\Extension\Core\Type\BaseType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RequestFormType extends BaseType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('data_class', RequestBag::class);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'amount',
                TextType::class,
                [
                    'constraints' => [
                        new AmountConstraint(),
                    ],
                ]
            )
            ->add(
                'currency',
                TextType::class,
                [
                    'constraints' => [
                        new CurrencyConstraint(),
                    ],
                ]
            )
            ->add(
                'description',
                TextType::class,
                [
                    'constraints' => [
                        new DescriptionConstraint(),
                    ],
                ]
            )->add(
                'api_version',
                TextType::class,
                [
                    'constraints' => [
                        new ApiVersionConstraint(),
                    ],
                ]
            )
            ->add(
                'id',
                TextType::class,
                [
                    'constraints' => [
                        new IdConstraint(),
                    ],
                ]
            )
            ->add(
                'lang',
                TextType::class,
                [
                    'constraints' => [
                        new LangConstraint(),
                    ],
                ]
            )->add(
                'channel',
                TextType::class,
                [
                    'constraints' => [
                        new ChannelConstraint(),
                    ],
                ]
            )->add(
                'ch_lock',
                TextType::class,
                [
                    'constraints' => [
                        new ChLockConstraint(),
                    ],
                ]
            )->add(
                'channel_groups',
                TextType::class,
                [
                    'constraints' => [
                        new ChannelGroupsConstraint(),
                    ],
                ]
            )->add(
                'URL',
                TextType::class,
                [
                    'constraints' => [
                        new URLConstraint(),
                    ],
                ]
            )->add(
                'type',
                TextType::class,
                [
                    'constraints' => [
                        new TypeConstraint(),
                    ],
                ]
            )->add(
                'buttontext',
                TextType::class,
                [
                    'constraints' => [
                        new ButtontextConstraint(),
                    ],
                ]
            )->add(
                'bylaw',
                TextType::class,
                [
                    'constraints' => [
                        new BylawConstraint(),
                    ],
                ]
            )->add(
                'personal_data',
                TextType::class,
                [
                    'constraints' => [
                        new PersonalDataConstraint(),
                    ],
                ]
            )->add(
                'URLC',
                TextType::class,
                [
                    'constraints' => [
                        new URLCConstraint(),
                    ],
                ]
            )->add(
                'expiration_date',
                TextType::class,
                [
                    'constraints' => [
                        new ExpirationDateConstraint(),
                    ],
                ]
            )->add(
                'control',
                TextType::class,
                [
                    'constraints' => [
                        new ControlConstraint(),
                    ],
                ]
            )->add(
                'firstname',
                TextType::class,
                [
                    'constraints' => [
                        new FirstnameConstraint(),
                    ],
                ]
            )->add(
                'lastname',
                TextType::class,
                [
                    'constraints' => [
                        new LastnameConstraint(),
                    ],
                ]
            )->add(
                'email',
                TextType::class,
                [
                    'constraints' => [
                        new EmailConstraint(),
                    ],
                ]
            )->add(
                'street',
                TextType::class,
                [
                    'constraints' => [
                        new StreetConstraint(),
                    ],
                ]
            )->add(
                'street_n1',
                TextType::class,
                [
                    'constraints' => [
                        new StreetN1Constraint(),
                    ],
                ]
            )->add(
                'street_n2',
                TextType::class,
                [
                    'constraints' => [
                        new StreetN2Constraint(),
                    ],
                ]
            )->add(
                'state',
                TextType::class,
                [
                    'constraints' => [
                        new StateConstraint(),
                    ],
                ]
            )->add(
                'addr3',
                TextType::class,
                [
                    'constraints' => [
                        new Addr3Constraint(),
                    ],
                ]
            )->add(
                'city',
                TextType::class,
                [
                    'constraints' => [
                        new CityConstraint(),
                    ],
                ]
            )->add(
                'postcode',
                TextType::class,
                [
                    'constraints' => [
                        new PostcodeConstraint(),
                    ],
                ]
            )->add(
                'phone',
                TextType::class,
                [
                    'constraints' => [
                        new PhoneConstraint(),
                    ],
                ]
            )->add(
                'country',
                TextType::class,
                [
                    'constraints' => [
                        new CountryConstraint(),
                    ],
                ]
            )->add(
                'deladdr',
                TextType::class,
                [
                    'constraints' => [
                        new DeladdrConstraint(),
                    ],
                ]
            )->add(
                'p_info',
                TextType::class,
                [
                    'constraints' => [
                        new PInfoConstraint(),
                    ],
                ]
            )->add(
                'p_email',
                TextType::class,
                [
                    'constraints' => [
                        new PEmailConstraint(),
                    ],
                ]
            )->add(
                'blik_code',
                TextType::class,
                [
                    'constraints' => [
                        new BlikCodeConstraint(),
                    ],
                ]
            )

//            ->add(
//                // @todo Remove this parameter? Add field on submit event
//                // to remove this from model data
//                // @remove also validators?
//                'chk',
//                TextType::class,
//                [
//                    'constraints' => [
//                        new ChkConstraint(),
//                    ],
//                ]
//            )

            ->addEventListener(
                FormEvents::SUBMIT,
                [$this, 'onSubmit']
            );
    }

    public function onSubmit(FormEvent $event)
    {
        $event->getData()->chk = (
        new CHK(
            $event->getData(),
            '1234'
        )
        )->__toString();
    }
}
